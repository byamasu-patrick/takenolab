<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("role:mentor");
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if((Auth::user()->id != 0) && (Auth::user()->account_type == "teacher")){            
            return view('user.index');
        }
        else{
            return redirect('/');
        }
    }
}
