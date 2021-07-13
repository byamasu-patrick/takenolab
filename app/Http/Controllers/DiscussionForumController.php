<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiscussionForum;
use App\Models\DiscussionComments;
use App\Models\Course;
use Auth;

class DiscussionForumController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function create_discusssion_topic(Request $request){
        try {
            //code...
            if ((Auth::user()->id > 0) && (Auth::user()->account_type == "teacher")) {
                $discussion_topic = new DiscussionForum();
                $discussion_topic->course_id = (int) $request->input('course_id');
                $discussion_topic->topic_id = (int) $request->input('topic_id');
                $discussion_topic->teacher_id = (int) Auth::user()->id ;
                $discussion_topic->discussion_description = $request->input('dicussion_description');
                $discussion_topic->save();
                return \redirect()->back();
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd("An error has occured while saving in the database!!!");
        }
    }
    
}
