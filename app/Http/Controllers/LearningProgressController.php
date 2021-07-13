<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LearningProgress;
use App\Models\User;
use App\Models\Course;
use App\Models\Topic;
use App\Models\CourseMaterials;
use Auth;

class LearningProgressController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("role:student");
    }
    // Check the validation of data first before adding the progress
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'student_id' => ['required', 'integer'],
            'course_id' => ['required', 'integer'],
            'week_id' => ['required', 'integer'],
            'video_played' => ['required', 'integer'],
            'week_progress' => ['required', 'integer'],
        ]);
    }
    public function new_progress(Request $request)
    {
        try {
            //code...
            if((Auth::user()->id == 0) || (Auth::user()->account_type != "student")){
                return response()->json([
                    'status' => FALSE,
                    'message' => "Please your are not authenticated",
                    'url' => "/login"
                ]);
            }
            else {
                // Add new progress in the table, if already added in the learning progress table, then
                // Update the progress in of the currently learning course.
                if($request->isMethod('post'))
                {
                    // Getting the data sent in the request via the post method.
                    $data_progress = $request->all();
                    if (($total_videos_played = LearningProgress::where("video_played", (int) $data_progress['lecture_video_id'] )
                        ->where("week_id", $data_progress['week_id'])
                        ->where("student_id", (int) Auth::user()->id)->get()->count()) == 0) {
                        # code...
                        $student = new LearningProgress();
                        //Check the week progress to determine the global progress of the learning
                        //Get the progress
                        $progress = $this->getProgress($data_progress['course_id'], $data_progress['week_id'], 1);
                        //New Progress
                        $student->student_id = (int) Auth::user()->id;
                        $student->course_id = $data_progress['course_id'];
                        $student->week_id = $data_progress['week_id'];
                        $student->video_played = $data_progress['lecture_video_id'];
                        $student->week_progress = $progress;
                        // Commit the changes to the database
                        $student->save(); 
                        // Return the response
                        return response()->json([
                            'status' => TRUE,
                            'messages' => "Successfully updated the progress!"
                        ]);                   
                    }
                }
                
            }

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => FALSE,
                'messages' => "Error while updating the new progress, please contact your technician",
                "getMessage" => $th->getMessage()
            ]);
        }
    }
    private function getProgress($course_id, $week_id, $total_videos_played){
        try {
            //Get all the videos for a particular week, this will allow to keep the progress of the learner as he/she is learning
            $video_lectures = CourseMaterials::where("course_id", (int) $course_id)->get();
            $progress = ($total_videos_played * 100) / $video_lectures->count();
            return $progress;
        } catch (\Throwable $th) {
            //throw $th;
            return 0;
        }
    }
}
