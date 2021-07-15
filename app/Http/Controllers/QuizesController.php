<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use App\Models\ResultBook;
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
                    "course_id" => $course_id
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with("message", "You cannot take the quiz now");
        }
    }
}
