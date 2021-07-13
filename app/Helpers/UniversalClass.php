<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Auth;
use File;

class UniversalClass{
    public function __construct(){
        // Initializing global variables
    }
    public function moveUploadedFiles(Request $request, $destinationPath, $inputName, $fileName){
        try {
            //Check if the file exists or not, if it exists move the uploaded file to that path, if it is not 
            //Create the folder and then move the uploaded file.
            if (Auth::user()->id != 0 && Auth::user()->account_type == "administrator") {
                if($file = $request->file($inputName)){
                    //Creating the filename  
                    $destinationPath = public_path($destinationPath);                    
                    if (!File::exists($destinationPath)) {
                            # code...
                            File::makeDirectory($destinationPath, 0777, true, true);
                    } 
                    $file->move($destinationPath, $fileName);
                    // Save the changes to the database 
                    return [
                        'status' => TRUE, 
                        'message' => "Successfully moved to ". $destinationPath
                    ];
                    //return redirect('/teacher/account/'. Auth::user()->id);
                }
                return FALSE;
            }
                
        } catch (\Throwable $th) {
                //throw $th;
                              
                return [
                    "status" => FALSE,
                    "message" => $th->getMessage()
                 ];
        }
    }
    public static function splitLinks($links){
        try {
            //Check if there are more than one links uploaded
            $links_data = explode(";", $links);
            if (count($links_data) > 0) {
                # code...
                return $links_data;
            }
            return $links;
        } catch (\Throwable $th) {
            //throw $th;
            return NULL;
        }
    }
    public static function separateMultipleUploadFiles(Request $request, $inputName, $destinationPath){
        try {
            //We check if the uploaded files is greater than 0
            $data_f = array();
            $i = 0;        
            $destinationPath = public_path() .'/'. $destinationPath;     
            if($request->hasFile($inputName)){                                
                foreach ($request->file($inputName) as $file) {
                    # get each uploaded file and move it to the right directory
                    $name = time() .'-'. $file->getClientOriginalName();
                    $file->move($destinationPath, $name); 
                    $data[] = $name;                    
                    $files_name = array(
                        "name" => $name,
                        "extension" => $file->getClientOriginalExtension()
                    );
                    // Save different file according to their type
                    $data_f[$i] = $files_name;                   
                    $i++;
                    unset($file);
                }
            }
            return count($data_f) > 0 ? $data_f : NULL; 
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }
    
}

?>