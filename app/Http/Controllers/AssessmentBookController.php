<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssessmentBookController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("role:teacher");
    }
    public function create_assessement(Request $request){
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            dd($this->getMessage());
        }
    }
}
