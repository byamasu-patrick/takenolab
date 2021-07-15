<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Topic;
use App\Models\Subtopic;
use App\Models\User;
use Auth;

class CourseController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth");
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'course_name' => ['required', 'string'],
            'course_image' => ['required', 'string'],
            'course_heading' => ['required', 'string'],
            'course_overview' => ['required', 'string'],
            'title_catching_area_one' => ['required', 'string'],
            'course_catching_area_one' => ['required', 'string'],
            'title_catching_area_two' => ['required', 'string'],
            'course_catching_area_two' => ['required', 'string'],
            'title_catching_area_three' => ['required', 'string'],
            'course_catching_area_three' => ['required', 'string'],
            'taught_by' => ['required', 'integer']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     * 
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create(Request $request)
    {
        try {
            if (Auth::user()->id != 0 && Auth::user()->account_type == "administrator") {
                if ($file = $request->file('course_image')) {
                    # code...
                    $course_img = time() .'-'. Auth::user()->id . '-'. $request->input('course_name') .'.' . $file->getClientOriginalExtension();
                    $course = Course::create([
                        'course_name' => $request->input('course_name'),
                        'course_image' => $course_img,
                        'course_heading' => $request->input('course_heading'),
                        'course_overview' => $request->input('course_overview'),
                        'title_catching_area_one' => $request->input('title_catching_area_one'),
                        'course_catching_area_one' => $request->input('course_catching_area_one'),
                        'title_catching_area_two' => $request->input('title_catching_area_two'),
                        'course_catching_area_two' => $request->input('course_catching_area_two'),
                        'title_catching_area_three' => $request->input('title_catching_area_three'),
                        'course_catching_area_three' => $request->input('course_catching_area_three'),
                        'taught_by' => 0
                    ]);
                    $this->add_course_image($request, $course_img);
                }
                
                // Return the course id 
                //return view('admin.courses', ['courses' => $this -> getAllCourses()]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($request->input('course_name'));
            //return redirect('/admin/courses');
        }
        //Getting the Course image name or the short course's video
        
        return redirect('/admin/courses/course_details?course_id='. $course->id);
    }
    public function course_details(){
        $course_id = request('course_id');
        return view('admin.course_details', ['course_id' => $course_id]);
    }

    
    public function create_subtopics(){}
    public function courses(){
        //dd("Hello");
        $courses = Course::all();
        // if ($couses != NULL) {
        //     # code...
        //     $topics = Topic::all()->where('course_id', $courses)
        // }
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
        //$courses = Course::join('topics', 'topics.course_id', '=', 'courses.id')->join('subtopics', 'subtopics.course_id', '=', 'courses.id')->distinct('courses.course_name')->get(['courses.*', 'topics.topic_name', 'subtopics.subtopic_name']);
        return view('admin.courses', [
                'courses' => $courses
            ]);
    }
    private function get_teacher($user_id){
        try {
            //code...
            if (Auth::user()->id > 0 && Auth::user()->account_type == "administrator") {
                # code...
                $user = User::where('id', $user_id)->get(['users.name']);
                return ($user != NULL) ? $user : NULL;
            }
            return NULL;

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    //
    public function assign_teacher($teacher_id){
        try {
            $course_id = request('course_id');
            if ($teacher_id != 0 && $course_id != 0) {
                # php artisan make:migration add_paid_to_users_table --table=users
                $course_assign_teacher = Course::where('id', (int) $course_id)->first();
                $course_assign_teacher->taught_by = $teacher_id;
                $course_assign_teacher->save();
                if ($course_assign_teacher->taught_by == $teacher_id) {
                    //Return the course name so that it should be set to courses that are taught by a certain teacher
                    return response()->json([$course_assign_teacher->course_name, 200]);
                }
            }            
            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    //
    public function course_edit(){

    }
    public function course_add(){
    
    }
    protected function getAllCourses(){
        $all = Course::all();
        return $all;
    }
    protected function getCourses(){
        $course = Course::join('topics', 'topics.course_id', '=', 'courses.id')->join('subtopics', 'subtopics.course_id', '=', 'courses.id')->get(['courses.*', 'topics.topic_name', 'subtopics.subtopic_name']);
        return $course;
    }
    public function add_course_image(Request $request, $course_img){
        try {
            //Check first if the user is authenticated
            if (Auth::user()->id != 0 && Auth::user()->account_type == "administrator") {
                if($file = $request->file('course_image')){
                    //Creating the filename                     
                    $destinationPath = public_path("images/courses/");
                    $file->move($destinationPath, $course_img);
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
    public function course_visibility($course_id){
        try {
            //Update the visibility of the courses
            if ((Auth::user()->id > 0) && (Auth::user()->account_type == "administrator")) {
                # Update the visibility
                $course = Course::where("id", (int) request("course_id"))->first();
                if (!is_null($course)) {
                    $course->status = trim(request("status"));
                    $course->save();
                    unset($course);
                    return response()->json([
                        "message" => "The state has successfully been updated!",
                        "status" => TRUE
                    ]);
                }      
                return response()->json([
                    'message' => "An error occured while changing the course status!",
                    "status" => FALSE
                ]);          
            }
            return response()->json([
                'message' => "You are not allowed to perfom this action because you don't have access to this action.",
                "status" => FALSE
            ]);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()]);
        }
        return response()->json([
            'message' => "arrived, course id is: ". request("status"),
            "status" => FALSE
        ]);
    }
    public function getEnrolledStudent($course_id){
        try {
            if ((Auth::user()->id > 0) && (Auth::user()->account_type == "administrator")) {
                dd("Arrived");
            }
            return redirect()->back()->with('success', 'You do not have the rights to access this pages!'); 
            
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('success', 'An error occured during the load of the data');   
        }
    }
}
