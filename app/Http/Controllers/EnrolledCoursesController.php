<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Course;
use App\Models\Topic;
use App\Models\Subtopic;
use App\Models\EnrolledCourses;
use App\Models\DiscussionForum;
use App\Models\DiscussionComments;
use App\Models\CourseMaterials;
use Illuminate\Support\Facades\Hash;

use Auth;

class EnrolledCoursesController extends Controller
{
    //
    /*
        
    */
    public function __construct()
    {
        $this->middleware("auth");
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_id' => ['required', 'integer'],
            'course_id' => ['required', 'integer'],
            'course_progress' => ['required', 'integer'],
            'enrolled_date' => ['required', 'string', 'min:10','max:255'],
            'expected_finished_date' => ['required', 'string', 'min:10','max:255']
        ]);
    }
    public function create(){
        try {
            //Check if the user is authenticated, if not then redirect them to the same page with a message
            if ((Auth::user()->id > 0) && (Auth::user()->account_type == 'student')) {
                # Allow the student to enroll to this particular course
                $enrolled = new EnrolledCourses(); 
                $enrolled->user_id = Auth::user()->id;
                $enrolled->course_id = (int) request('course_id');
                $enrolled->course_progress = (int) 0.0;
                $enrolled->expected_finished_date = '';
                $enrolled->enrolled_date = '';
                //flush or save the changes to the database
                $enrolled->save();
                //dd($enrolled);
                if($enrolled->user_id == Auth::user()->id){
                    return redirect('/student/courses/learn?course_id='. request('course_id'));
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect('/student/courses/view?courseDetails=TRUE&courseID='. request('course_id'));
        }
    }
    public function getCourseContent(){
        return;
    }
    public function learn(){
         //Check if the user is authenticated, if not then redirect them to the same page with a message
        if ((Auth::user()->id > 0) && (Auth::user()->account_type == 'student')) {
            return view('student.learn', [
                'courses' => $this->get_course_by_id(request('course_id')),
                'discussions' => $this->getLauchedDiscussion(request('course_id')),
                'videos_lecture' => $this->getFirstVideo((int) request('course_id'))
            ]);
        }
        return redirect('/');
    }
    public function getAllCourses(){
        try {
            //code...
            if ((Auth::user()->id > 0) && (Auth::user()->account_type == 'student')) {
                //Getting the courses taken and progress
                $enrolled = EnrolledCourses::where('user_id', Auth::user()->id)->pluck('course_id')->all();
                $courses = Course::whereNotIn('id', $enrolled)->get();
                if (count($courses) > 0) {
                    # code...]
                    $index  = 0;
                    while ($index < count($courses)) {
                        # code...
                        $teacher_name = $this->get_teacher($courses[$index]->taught_by);
                        if(count($teacher_name) > 0)
                            $courses[$index]['teacher_name'] = $teacher_name[0]->name;
                        else 
                            $courses[$index]['teacher_name'] = "Not yet assigned";
                        ++$index;
                    }
                }
                return view('student.explore', ['courses' => $courses]);               
            }
        } catch (\Throwable $th) {
            //throw $th;
            if ((Auth::user()->id <= 0) || (Auth::user()->account_type != 'student')) {
                return redirect('/');
            }
        }
    }
    private function get_teacher($user_id){
        try {
            //code...
           
            $user = User::where('id', $user_id)->get(['users.name']);
            return ($user != NULL) ? $user : NULL;

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    //
    protected function get_course_by_id($course_id){
        try {
            //Checking the currently logged in user and then send the information to the user
            if ((Auth::user()->id > 0) && (Auth::user()->account_type == "student")) {
                # The query parameters sent from the header request file.
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
                return $course_informations;

            }
        } catch (\Throwable $th) {
            //throw $th;
            dd(["Error" => "Error while fetching the database"]);
        }
    }
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
    //course_materials
    private function getFirstVideo($course_id){
        try {
            //code...
            if ((Auth::user()->id > 0) && (Auth::user()->account_type == "student")) {
                # code...
                $video_lecture = CourseMaterials::join('courses', 'courses.id', '=', 'course_materials.course_id')
                    //->join('topics', 'topics.id', '=', 'course_materials.topic_id')
                    ->where("course_id", $course_id)
                    ->orderBy('course_materials.topic_id', 'ASC')
                    ->orderBy('course_materials.id', 'ASC')
                    ->get(['course_materials.*', 'courses.course_name']);
                if (count($video_lecture) > 0) {
                    # code...
                    return $video_lecture;
                }
                return NULL;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    private function getNextVideo(){
        try {
            //code...
            if ((Auth::user()->id > 0) && (Auth::user()->account_type == "student")) {
                # code...
                $video_lecture = CourseMaterials::where("course_id", $course_id)->where("topic_id", $topic_id)->get();
                if (count($video_lecture) > 0) {
                    # code...
                    return $video_lecture;
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
