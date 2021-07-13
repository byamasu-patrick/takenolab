<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Course;
use App\Models\Topic;
use App\Models\Subtopic;
use App\Models\DiscussionForum;
use App\Models\DiscussionComments;
use App\Helpers\UniversalClass;
use Auth;

class TeacherController extends Controller
{
    /**
     * Show the application dashboard.
     *$decrypt= Crypt::decrypt($data->password);  
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
       $this->middleware("role:teacher");
    }
    public function index()
    {
       // Auth::logout();
        if ((Auth::user()->id != 0) && (Auth::user()->account_type == 'teacher')) {
            # code...
            $courses = Course::where('taught_by', Auth::user()->id)->get();
            return view('teacher.index', ['courses' => $courses]);
         }
        return view('/');
    }
    //View all the courses
    public function view_courses(){
        if ((Auth::user()->id != 0) && (Auth::user()->account_type == 'teacher')) {
            # code...
            $courses = Course::all();
            return view('teacher.courses', ['courses' => $courses]);
         }
        return view('/');
    }
    //Getting data for the account for viewing the information and editing them
    public function account($user_id){
        try {
            //Checking the id of the currently logged in user before sending the informations to the user
            if ((Auth::user()->id == $user_id) && (Auth::user()->account_type == 'teacher')) {
                # Get teachers data and then send them to the blade template
                $teacher = User::where('id', $user_id)->first();
                if($teacher != NULL)
                    return view('teacher.account_settings', ['teacher' => $teacher]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            if ((Auth::user()->id == $user_id) && (Auth::user()->account_type == 'teacher'))
                return redirect('/teacher');
        }
    }
    // Getting the courses taught by a particular teacher
    public function courses_taught($id){
        try {
            //code...
            if ((Auth::user()->id == $id) && (Auth::user()->account_type == 'teacher')) {
                # Get teachers data and then send them to the blade template
                $teacher = User::where('id', $id)->first();
                return view('teacher.couses_taught', ['teacher' => $teacher]);
            }
            
        } catch (\Throwable $th) {
            //throw $th;
            if ((Auth::user()->id == $id) && (Auth::user()->account_type == 'teacher')) {
                #
                redirect('/teacher');
            }
        }
    }
    public function view_course_details(){
        try {
            //Checking the currently logged in user and then send the information to the user
            if ((Auth::user()->id > 0) && (Auth::user()->account_type == "teacher")) {
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
                return view('teacher.course_details', ['courses' => $course_informations]);

            }
        } catch (\Throwable $th) {
            //throw $th;
            dd(["Error" => "Error while fetching the database"]);
        }
    }
    //Enable editing of the account for teachers
    public function edit_account(Request $request){
        try {
            if (Auth::user()->id != 0 && Auth::user()->account_type == "teacher") {
                # Save the changes
                $teacher = User::where('id', Auth::user()->id)->first();
                if ($teacher != NULL) {
                    # Modify the contents and save the changes
                    $teacher->name = trim($request->input('username'));
                    $teacher->email = trim($request->input('email'));
                    $teacher->phone = trim($request->input('phone_number'));
                    $teacher->password = Hash::make($request->input('password'));
                    $teacher->save();
                    //dd($student);
                    return redirect('/teacher/account/'. $teacher->id);
                }                
            }
            
        } catch (\Throwable $th) {
            //throw $th;
        }
        
    }
    public function teach_course_details(){
        try {
            //code...
            if (Auth::user()->id != 0 && Auth::user()->account_type == "teacher") {
                if (request("token") != NULL) {
                    # code...
                    $courses = $this->get_course_by_id(request("course_id"));
                    //dd($this->getLauchedDiscussion(request("course_id")));      
                    //dd(($courses));              
                    return view("teacher.teach", [
                        'courses' => $courses,
                        'discussions' => $this->getLauchedDiscussion(request("course_id"))
                        ]);
                    //dd("Arrived");
                }                
                // Return with the message
                return redirect('/');
                
            }
            //return redirect("/");
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());      
        }
    }
    //Function for changing profile picture
    public function change_profile(Request $request){
        try {
            //Check first if the user is authenticated
            if (Auth::user()->id != 0 && Auth::user()->account_type == "teacher") {
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
    protected function get_course_by_id($course_id){
        try {
            //Checking the currently logged in user and then send the information to the user
            if ((Auth::user()->id > 0) && (Auth::user()->account_type == "teacher")) {
                # The query parameters sent from the header request file.
                $course_informations = Course::where('id', (int) $course_id)->get();
                // Getting all the topics and subtopics for enrolling the courses
                $topics_data = Topic::where('course_id', $course_informations[0]->id)->get();
                $topics = array();
                //dd(count($topics_data));
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
                    $course_informations[0]['topics'] = $topics;
                }
                //dd($course_informations);
                return $course_informations;

            }
        } catch (\Throwable $th) {
            //throw $th;
            dd(["Error" => "Error while fetching the database"]);
        }
    }
    // protected function getLaunchedDiscussionLaunched($course_id){
    //     /
    // }
    protected function getLauchedDiscussion($course_id){
        try {
            //code...
            //$courses = Course::join('topics', 'topics.course_id', '=', 'courses.id')->join('subtopics', 'subtopics.course_id', '=', 'courses.id')->distinct('courses.course_name')->get(['courses.*', 'topics.topic_name', 'subtopics.subtopic_name']);
            if ((Auth::user()->id > 0) && ((Auth::user()->account_type == "teacher") || (Auth::user()->account_type == "student"))) {
                //dd("Arrived");
                $discussions = DiscussionForum::join("topics", "topics.id", "=", "discussion_forums.topic_id")->where("discussion_forums.course_id", $course_id)->get(['discussion_forums.*', 'topics.topic_name']);
                // dd("Arrived");
                //dd($discussions);
                if ($discussions != NULL) {
                    # code...   
                    $i = 0;                    
                    while ($i < count($discussions)) {
                        # code...                        
                        $comments = $this->getCommentsFromLaunchedDiscussion($discussions[$i]->id);
                        $discussions[$i]['comments'] = $comments;
                        //dd($discussions);
                        $i++;
                        //dd( $comments );
                    }                   
                }                
                return $discussions;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    protected function getCommentsFromLaunchedDiscussion($discusion_id){
       try {
            //code...
            //$courses = Course::join('topics', 'topics.course_id', '=', 'courses.id')->join('subtopics', 'subtopics.course_id', '=', 'courses.id')->get(['courses.*', 'topics.topic_name', 'subtopics.subtopic_name']);
            if ((Auth::user()->id > 0) && (Auth::user()->account_type == "teacher" || Auth::user()->account_type == "student")) {
                $comments = DiscussionComments::join('users', 'users.id', '=', 'discussion_comments.user_id')->where("discussion_id", $discusion_id)->get(['discussion_comments.*', 'users.name', 'users.account_type', 'users.profile']);
                ///dd($comments);
                return ($comments != NULL) ? $comments : NULL;
            }
            return NULL;
        } catch (\Throwable $th) {
            //throw $th;
            dd("Erroe while fetching the database...!!!");
        }
    }
    
    //Get the name of the teacher
    
}
