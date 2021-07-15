<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResultBook;
use App\Models\Course;
use App\Models\Topic;
use Auth;

class ResultBookController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("role:student");
    }
    
}
