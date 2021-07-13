<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\AdditionalCourseMaterials;
use App\Helpers\UniversalClass;
use Auth;

class AdditionalCourseMaterialsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("role:teacher");
    }
    public function create_course_materials(Request $request){
        try {
            //code...            
            //$universalClass = new UniversalClass();
            if (Auth::user()->id > 0 && (Auth::user()->account_type == "teacher")) 
            {
                # get the values of the sent data
                $this->validate($request, [
                    'files_data' => 'required',
                    'files_data.*' => 'mimes:doc,pdf,docx,zip,ppt,pptx'
                ]);
                $description = $request->input("description");
                $course_id = (int) $request->input("setting_course_id");
                $topic_id = (int) $request->input("setting_week_id");
                //Split links by semicolon                
                $additional_links = UniversalClass::splitLinks($request->input("additional_links"));
                //Get the course name 
                $course_name = Course::where("id", $course_id)->pluck("course_name")[0];
                //dd($course_name);
                //Separate the files and save data into the database
                $uploaded_files_info = UniversalClass::separateMultipleUploadFiles($request, "files_data", "videos/courses/". $course_name);
                // Save the information to the database
                $materials = new AdditionalCourseMaterials();
                $materials->course_id = $course_id;
                $materials->topic_id = $topic_id;
                $materials->week_description = $description;

                if (count($additional_links) > 0) {
                    # code...
                    $size = count($additional_links);
                    if($size == 1)
                        $materials->reference_link_one = $additional_links[0];
                    if($size == 2){
                        $materials->reference_link_one = $additional_links[0];
                        $materials->reference_link_two = $additional_links[1];
                    }
                    if($size == 3){
                        $materials->reference_link_one = $additional_links[0];
                        $materials->reference_link_two = $additional_links[1];
                        $materials->reference_link_three = $additional_links[2];
                    }
                    if($size == 4){
                        $materials->reference_link_one = $additional_links[0];
                        $materials->reference_link_two = $additional_links[1];
                        $materials->reference_link_three = $additional_links[2];
                        $materials->reference_link_four = $additional_links[3];
                    }                    
                }
                if ((($size_ = count($uploaded_files_info)) > 0) && $uploaded_files_info != NULL ) {
                    # Check if an array contains a pdf, ppt, pptx, doc, or docx
                    $other_doc = "";
                    for ($i = 0; $i < $size_; $i++) { 
                        if(strtolower($uploaded_files_info[$i]['extension']) == 'pdf')
                            $materials->course_lecture = $uploaded_files_info[$i]['name'];
                        if((strtolower($uploaded_files_info[$i]['extension']) == 'ppt') || strtolower($uploaded_files_info[$i]['extension']) == 'pptx')
                            $materials->powerpoint_presentation = $uploaded_files_info[$i]['name'];
                        if((strtolower($uploaded_files_info[$i]['extension']) == 'doc') || strtolower($uploaded_files_info[$i]['extension']) == 'docx'){
                            $other_doc = $other_doc .";". $uploaded_files_info[$i]['name'];
                            $materials->powerpoint_presentation = $other_doc;
                        }
                    }
                }
                $materials->save();                
                return redirect()->back()->with('success', 'Sucessfully added!');
            }
            
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
           // return redirect('/teacher');
        }
    }
}
