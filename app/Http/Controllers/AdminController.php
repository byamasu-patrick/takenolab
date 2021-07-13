<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Topic;
use App\Models\Subtopic;
use App\Models\CourseMaterials;
use App\Helpers\UniversalClass;
use File;
use Auth;

class AdminController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
        $this->middleware("role:administrator");
    }
    public function index(){
        if ((Auth::user()->id != 0) && (Auth::user()->account_type == "administrator")) {
            # code...
            return view('admin.index');
        }
        return redirect("/");
        
    }
    public function getTeachers(){
        try {
            //Get users that where only assigned to be teachers so that they should be assigned to courses
            $teacher = User::where('account_type', 'teacher')->get();
            if(count($teacher) > 0){
                return response()->json($teacher, 200);
            }
            return response()->json(NULL, 200);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => "Error while fecthing data from the databases"]);
        }
    }
    public function accounts(){
        $users = User::all();
        
        return view('admin.accounts', [ 'users' => $users ] );
    }
    public function accounts_edit(Request $request, $id){
        //dd($id);
        $user = User::where('id', $id)->first();
       
        return response()->json($user);
    }
    public function edit_account(Request $request){
        //Run the check of the validation data
        try {
            //code...
            if (Auth::user()->id != 0 && Auth::user()->account_type == "administrator") {
                # code...    
                if ($file = $request->file('profile')) {
                          
                    $request -> validate([
                        'name' => 'required|min:4|string|max:255',
                        'email' => 'required|email|string|max:255',
                        'phone' => 'required'
                    ]);
                    //The the profile file information move the data into the public folder
                    $profile_img = time() .'-'. Auth::user()->id . '-'. $request->input('user_id') .'.' . $file->getClientOriginalExtension();
                    $this -> add_course_image($request, $profile_img);
                    // Get ta single user and update the record ins the database
                    $user_data = User::find($request->input('user_id'));
                    //dd($request->input('user_id'));
                    $user_data -> name = $request->input('name');
                    $user_data -> phone = $request->input('phone');
                    $user_data -> email = $request->input('email');
                    $user_data -> profile = $profile_name;
                    $user_data -> password = $request->input('password');
                    $user_data -> save();
                    return redirect('/admin/accounts');
                 # code...
                }     
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
        
    }
    //Update user account from the administrator
    protected function add_course_image(Request $request, $profile_img){
        try {
            //Check first if the user is authenticated
            if (Auth::user()->id != 0 && Auth::user()->account_type == "administrator") {
                if($file = $request->file('profile')){
                    //Creating the filename                     
                    $destinationPath = public_path("images/users/");
                    
                    $file->move($destinationPath, $profile_img);
                    // Save the changes to the database
                    return TRUE;
                    //return redirect('/teacher/account/'. Auth::user()->id);
                }
                return FALSE;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function view_course_details(){
        try {
            //Checking the currently logged in user and then send the information to the user
            if ((Auth::user()->id > 0) && (Auth::user()->account_type == "administrator")) {
                # The query parameters sent from the header request file.
                $course_id = request("course_id");
                $course_informations = Course::where('id', (int) $course_id)->first();
                // Getting all the topics and subtopics for enrolling the courses
                $topics_data = Topic::where('course_id', $course_informations->id)->get();
                $topics = array();
                if(count($topics_data) > 0){
                    for ($j = 0; $j < count($topics_data); $j++) { 
                        # code...
                        $topic_ = $topics_data[$j];
                        $subtopic = Subtopic::where('topic_id', $topics_data[$j]->id)->get();
                        //dd($subtopic); 
                        if (count($subtopic) > 0) {
                            # code...  
                            $topic_['subtopics'] = $subtopic;     
                        }
                        $topics[$j] = $topic_;
                        //dd($topics);
                        
                    }                       
                    $course_informations['topics'] = $topics;
                }
                //dd($course_informations);
                return view('admin.course_materials', ['courses' => $course_informations]);

            }
        } catch (\Throwable $th) {
            //throw $th;
            dd(["Error" => "Error while fetching the database"]);
        }
    }
    public function create_lessons(Request $request){
        try {
            //code...
            if ((Auth::user()->id > 0) && (Auth::user()->account_type == "administrator")) {
                $course = Course::where('id', $request->input('course_id'))->first();
                if($course != NULL){
                    //Save the video
                    $course_materials = new CourseMaterials();
                    //get the video name and move the video to the pulic/courses folder
                    if($file = $request->file('lesson_video')){
                        //Creating the filename   
                        $lecture_video_name =  $request->input("lessson_name") .'-'. time() .'-'. $request->input('course_id') .'.' . $file->getClientOriginalExtension();                 
                        //(Request $request, $destinationPath, $inputName, $fileName)
                        $universal_class = new UniversalClass();
                        $result = $universal_class->moveUploadedFiles($request, "videos/courses/". $course->course_name, "lesson_video", $lecture_video_name);
                        if ($result['status']) {
                            # code...
                            $course_materials->course_id = (int) $request->input("course_id");
                            $course_materials->topic_id = (int) $request->input("topic_id");
                            $course_materials->subtopic_id = (int) $request->input("subtopic");
                            $course_materials->lesson_name = $request->input("lesson_name");
                            $course_materials->lesson_description = $request->input("lesson_description");
                            $course_materials->lecture_video = $lecture_video_name;
                            $course_materials->visibility_state = 1;
                            $course_materials->save();
                        }
                        //redirect to the same page
                        return redirect('admin/courses/course_materials?course_id='. $request->input("course_id"));
                    }                   
                    
                }
                //dd(count($course));
            }            
            return redirect('/admin');

        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            //return redirect('/admin');
        }
    }
    public function delete_account(Request $request, $id){
        // checking if the current logged in user has the right to perfom this action
        // If not the the if statement will not pass and the function will return true
        // /dd(Auth::user()-> id);
        if (Auth::user()->id != 0 && Auth::user()->account_type == "administrator") {
            try {
                if($id != 0){
                    $user = User::where('id', $id)->first();
                    $user -> delete();
                    // Return true if the action has been fulfilled
                    return response()->json(['status' => 'true']);
                }
                //
                return response()->json(['status' => 'false']);
                
            } catch (\Throwable $th) {
                //throw $th;
               return redirect('/admin');
            }        //
            
         }
    }
    // Getting user by using his/here id
    public function getUserById($id){
        try {
            if (Auth::user()->id != 0 && Auth::user()->account_type == "administrator") {
                
                $user = User::find($id);
                return response()->json($user);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    
}
