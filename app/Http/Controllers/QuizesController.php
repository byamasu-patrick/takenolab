<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResultBook;
use App\Models\AssessmentBook;
use App\Models\Course;
use App\Models\Topic;
use Auth;
/*
    *
    *
    *
    *
    *
    *
*/
class QuizesController extends Controller
{
    //    
    public function __construct()
    {
        $this->middleware("role:student");
    }
    public function index($course_id){
        try {
            //Check if the user is authenticated first
            if ((Auth::user()->id > 0) && (Auth::user()->account_type == "student")) {
                # Then load the instructions
                return view("assessment.index", [
                    "course_id" => $course_id,
                    "topic_id" => (int) request("week_id")
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with("message", "You cannot take the quiz now");
        }
    }
    public function start($course_id, $week_id){
        try {
            //Check if the user is authenticated first
            if ((Auth::user()->id > 0) && (Auth::user()->account_type == "student")) {
                # Then load the questions  
                $questions = AssessmentBook::inRandomOrder()
                    ->where("course_id", $course_id)
                    ->where("topic_id", $week_id)
                    ->get();   
                //Remain with the snapshop of the questions before sending them      
                //dd($questions);          
                return view("assessment.start",[
                    "questions" => $questions,
                    "course_id" => $course_id,
                    "topic_id" => $week_id
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage()); 
            //return redirect()->back()->with("message", "You cannot take the quiz now");
        }
    }
    public function result(Request $request, $course_id, $week_id){
        try {
            //code...
            $final_result_ = 0.0;
            $questions = $request->input("questions");
            if (($size = count($questions)) > 0) {
                $index = 0;
                //dd($questions);
                while ($index < $size) {
                    # Check if the answers are correct
                    $question = (int) $questions[$index];
                    $answer =  $request->input("answer". $question);
                    $result = AssessmentBook::where("correct_answer", $answer)->where("id", $question)->first();        
                    $mark = 0.0;
                    if (!is_null($result)) {
                        $mark = (1 / $size) * 100;                        
                        //Get the final mark                        
                        $final_result_ += $mark; 
                    }
                    $result_set = new ResultBook();
                    $result_set->course_id = $course_id;
                    $result_set->topic_id = $week_id;
                    $result_set->student_id = (int) Auth::user()->id;
                    $result_set->question_id = $question;
                    $result_set->marks = $mark;
                    $result_set->selected_answer = $answer; 
                    $result_set->save();
                    $index++;
                }
            }
            return view("assessment.result", [
                "course_id" => $course_id,
                "result" => $final_result_
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }
}
