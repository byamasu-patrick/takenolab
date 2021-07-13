<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiscussionComments;
use App\Models\User;
use App\Models\Course;
use App\Models\Topic;
use App\Models\DiscussionForum;
use Auth;

class DiscussionCommentsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function create_discusssion_comment(Request $request){
        try {
            //code...
            if ((Auth::user()->id > 0) && ((Auth::user()->account_type == "teacher") || (Auth::user()->account_type == "student"))) {
                $discussion_comment = new DiscussionComments();
                $discussion_comment->course_id = (int) $request->input('course_id');
                $discussion_comment->topic_id = (int) $request->input('topic_id');
                $discussion_comment->user_id = (int) Auth::user()->id ;
                $discussion_comment->discussion_id = $request->input('discussion_id');
                $discussion_comment->comment_text = $request->input('comment_text');
                $discussion_comment->save();
                return \redirect()->back();
              
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd("Error while commiting the data to the database!!!");
        }
    }
}
