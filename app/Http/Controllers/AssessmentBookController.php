<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssessmentBook;
use App\Models\User;
use Auth;

class AssessmentBookController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("role:teacher");
    }
    // Check the validation input first
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'phone' => ['required', 'string', 'max:16', 'unique:users'],
    //         'account_type' => ['required', 'string', 'max:255'],
    //         'profile' => ['string', 'max:255'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }
    public function create_assessement(Request $request){
        try {
            //Insert data
            if (Auth::user()->id > 0 && (Auth::user()->account_type == "teacher")) 
            {                                   
                $course_id = (int) $request->input("assignment_course_id");
                $topic_id = (int) $request->input("assignment_week_id");
                $questions = $request->input("questions");
                $index = 0;
                //dd(count($questions));
                while($index < count($questions))
                {
                    $assessmentQuestions = new AssessmentBook();
                    $assessmentQuestions->course_id = $course_id;
                    $assessmentQuestions->topic_id = $topic_id;
                    $assessmentQuestions->teacher_id = Auth::user()->id;
                    // Save the questions and answers
                    $assessmentQuestions->question = $questions[$index];
                    //Get answers and save them in the database
                    $answerIndex = $index + 1;
                    $answers = $request->input("answers". $answerIndex);                         
                    $correctAnswer = ((int) $request->input("correctAnsw". $answerIndex)) - 1;
                    //if($index == 1) dd(($request->input()));
                    $assessmentQuestions->first_answer = $answers[0];
                    $assessmentQuestions->second_answer = $answers[1];
                    $assessmentQuestions->third_answer = $answers[2];
                    $assessmentQuestions->fourth_answer = $answers[3];
                    //Save the correct answer
                    $assessmentQuestions->correct_answer = $answers[$correctAnswer];
                    $assessmentQuestions->save(); 
                    //dd($assessmentQuestions);                     
                    $index++;
                    unset($assessmentQuestions);
                }
                return redirect()->back()->with('success', 'Assessment sucessfully added!');     
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }
}
