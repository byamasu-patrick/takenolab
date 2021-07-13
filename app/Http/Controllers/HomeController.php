<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Topic;
use App\Models\Subtopic;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    //
    public function index(){
        //if ((Auth::user()->id != 0) && (Auth::user()->account_type == 'teacher')) {
            # code...
        $courses = Course::all();
            //return view('teacher.courses', ['courses' => $courses]);
        // }
        return view('welcome', ['courses' => $courses]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('admin.accounts');
    // }
    public function course_detail($course_id){
        try {
            //Checking the currently logged in user and then send the information to the user
            //if ((Auth::user()->id > 0) && (Auth::user()->account_type == "student")) {
                # The query parameters sent from the header request file.
                $course_informations = Course::where('id', (int) $course_id)->first();                
                // Getting all the topics and subtopics for enrolling the courses
                $topics_data = Topic::where('course_id', $course_informations->id)->get();
               
                // $topics = array();
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
                return view('course_details', ['courses' => $course_informations]);

           // }
        } catch (\Throwable $th) {
            //throw $th;
            dd(["Error" => "Error while fetching the database"]);
        }
    }
    ///courses/enroll?course_id={{ $courses->id }}
    public function enroll(){
        try {
            //code...
            $course_id = request('course_id');
            return redirect('/student/courses/enroll?course_id='. $course_id);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
