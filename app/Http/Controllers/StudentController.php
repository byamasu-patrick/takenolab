<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Topic;
use App\Models\Subtopic;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Auth;

class StudentController extends Controller
{
    /**use Illuminate\Support\Facades\Hash;
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /*
    */
    public function __construct()
    {
        $this->middleware("role:student");
    }
    public function index()
    {
        if ((Auth::user()->id != 0) && (Auth::user()->account_type == 'student')) {
            # code...
                $courses = Course::join('enrolled_courses', 'enrolled_courses.course_id', '=', 'courses.id')
                    ->where('enrolled_courses.user_id', (int) Auth::user()->id )
                    ->where('courses.status', "visible")
                    ->get(['courses.*', 'enrolled_courses.course_progress']);
                if (count($courses) > 0) {
                    # code...]
                    $index  = 0;
                    while ($index < count($courses)) 
                    {
                        # code...
                        $teacher_name = $this->get_teacher($courses[$index]->taught_by);
                        if(count($teacher_name) > 0)
                        {
                            $courses[$index]['teacher_name'] = $teacher_name[0]->name;
                            $courses[$index]['progress'] = $this->getCourseProgress($courses[$index]->id);
                        }
                        else 
                            $courses[$index]['teacher_name'] = "Not yet assigned";
                        ++$index;
                    }
                }
                return view('student.index', ['courses' => $courses]);
        }
        return view('/');
        
    }
    // Get progress of enrolled courses
    private function getCourseProgress($course_id){
        try {
            //code...
            $progress = DB::table('learning_progress')->where('course_id', $course_id)
                ->where('student_id', (int) Auth::user()->id)->get()->sum('week_progress');
            return $progress;
        } catch (\Throwable $th) {
            //throw $th;
            return 0;
        }
    }
    //
    private function get_teacher($user_id){
        try {
            //code...
            //if (Auth::user()->id > 0 && Auth::user()->account_type == "administrator") {
                # code...
                $user = User::where('id', $user_id)->get(['users.name']);
                return ($user != NULL) ? $user : NULL;
           // }
            return NULL;

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function view_course_details(){
        try {
            //Checking the currently logged in user and then send the information to the user
            if ((Auth::user()->id > 0) && (Auth::user()->account_type == "student")) {
                # The query parameters sent from the header request file.
                $course_details = request("courseDetails");
                $course_id = request("courseID");
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
                return view('student.course_details', ['courses' => $course_informations]);

            }
        } catch (\Throwable $th) {
            //throw $th;
            dd(["Error" => "Error while fetching the database"]);
        }
    }
    public function account($id){
        try {
            //get currently logged in user from the Auth
            $current_user_id = Auth::user()->id;
            if (($current_user_id == $id) && (Auth::user()->account_type == 'student')) {
                # Fetch the information form the database
                $student = User::where('id', $id)->first();
                if ($student != NULL) {
                    # Return the view with data
                    return view('student.account_settings', ['student' => $student]);
                }
            }            
            
        } catch (\Throwable $th) {
            //throw $th;
            if(Auth::user()->id == $id){                
                return redirect('/student');
            }
        }
       
    }
    public function edit_account(Request $request){
        if (Auth::user()->id != 0 && Auth::user()->account_type == "student") {
            # Save the changes
            $student = User::where('id', Auth::user()->id)->first();
            if ($student != NULL) {
                # Modify the contents and save the changes
                $student->name = trim($request->input('username'));
                $student->email = trim($request->input('email'));
                $student->phone = trim($request->input('phone_number'));
                $student->password = Hash::make($request->input('password'));
                $student->save();
                //dd($student);
                return redirect('/student/account/'. $student->id);
            }
            
        }
    }
    //Function for changing profile picture
    public function change_profile(Request $request){
        try {
            //Check first if the user is authenticated
            if (Auth::user()->id != 0 && Auth::user()->account_type == "student") {
                if($file = $request->file('profile')){
                    //Getting current user
                    $teacher = User::where('id', Auth::user()->id)->first();
                    //Creating the filename 
                    $profile_filename = time() .'-'. Auth::user()->id . '-'. Auth::user()->account_type .'.' . $file->getClientOriginalExtension();
                    $destinationPath = public_path("images/users/");
                    $file->move($destinationPath, $profile_filename);
                    // Save the changes to the database
                    $profile =  $profile_filename;
                    $teacher->profile = $profile;
                    //Storage::disk('local')->put($destinationPath . $profile_filename, $file);
                    $teacher->save();

                    Auth::user()->profile = $teacher->profile;
                    //dd($request->file('profile'));
                    return \redirect()->back();
                    //return redirect('/teacher/account/'. Auth::user()->id);
                }
                return \redirect()->back();
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
