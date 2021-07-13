<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Subtopic;

class TopicController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth");
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'topic_name' => ['required', 'string'],
            'course_id' => ['required', 'integer']
        ]);
    }
    public function create(Request $request){
        if ($request->isMethod('post')) {
            # code...
            try {
                //code...
                $response = array(
                    'status' => 'success',
                    'msg' => "Topic successufully added!"
                );
                // Adding topic in the topic table and then return the current topic id
                $topic_ = new Topic;
                $data = $request->all();
                $topic_->topic_name = $data['topic_name'];
                $topic_->course_id = (int) $data['course_id'];
                $topic_->save();
                //Call user defined function for inserting subtopics into the database
                //Using the foreign key of course_id and topic_id insert data
                $subtopic_contents[0] = $data['first_subtopic'];
                $subtopic_contents[1] = $data['second_subtopic'];
                $subtopic_contents[2] = $data['third_subtopic'];
                //Call the actual function
                $this->insertSubtopic($subtopic_contents, (int) $topic_->id, (int) $data['course_id']);
                //Return the json response
                unset($topic_);
                return response()->json([ 'response'=> $response ]);
            } catch (\Throwable $th) {
                //throw $th;
                return response()->json(['response'=> "Error while inserting data in the database!!"]);
            }
        }
      
        return;
    }
    private function insertSubtopic($subtopic_contents, $topic_id, $course_id){
        try {
            //Adding the exception handling for preventing errors
            if (count($subtopic_contents) > 1) {
                # Dynamically adding data
                for ($i=0; $i < count($subtopic_contents); $i++) { 
                    # Create a new topic object for insertion
                    $subtopic_ = new Subtopic;
                    $subtopic_->subtopic_name = $subtopic_contents[$i];
                    $subtopic_->topic_id = (int) $topic_id;
                    $subtopic_->course_id = (int) $course_id;
                    $subtopic_->save();
                    // Destroy the object to freeup space in the memory
                    if ($subtopic_ != NULL) {
                        # code...
                        unset($subtopic_);
                        continue;
                    }
                }
                return;
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['response' => "Error while inserting the subtopics"]);
        }
    }
}
