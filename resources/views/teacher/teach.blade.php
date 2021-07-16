@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row">
    @include('teacher.header')
    <div class="col-lg-10">
        <div class="row" style="height: 180px; text-align: center; background: #f8f9fa;">
            <div class="col-12">
                    <h1 style="color:#000; font-weight: bold; "> {{ $courses[0]->course_name }} </h1>
                    <a href="http://" class="btn btn-lg" style="background: rgb(109, 130, 74); color:white; margin-top: 30px;" target="_blank" rel="noopener noreferrer">Open the Room</a>
            </div>                
        </div>
        <div class="row">
            <div class="col-lg-3">
                        <div class="dropdown mr-1">
                            <div class="accordion" id="course_topic">
                                @for($i = 0; $i < count($courses[0]->topics); $i++)
                                    <div class="card" style="background: #fff; border: none;">
                                        <div class="card-header" id="headingOne" style="background: #fff; border: none;">
                                            <h5 class="mb-0">
                                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapse{{ $i }}" aria-expanded="true" aria-controls="collapse{{ $i }}" style="color: rgb(109, 130, 74);width: 100%; text-align: left; font-size: 14px; text-decoration: none;">
                                                 <span class="fa fa-assistive-listening-systems" aria-hidden="true" style="margin-right: 5px;"></span>  Week {{ $i + 1 }} : {{ $courses[0]->topics[$i]->topic_name }} 
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse{{ $i }}" class="collapse" aria-labelledby="heading{{ $i }}" data-parent="#course_topic">
                                            <div class="card-body">
                                                <ul class="u-text u-text-5" style="margin-left: 5%; font-size: 12px;">
                                                    @for($j = 0; $j < count($courses[0]->topics[$i]->subtopics); $j++)
                                                        <li >{{ $courses[0]->topics[$i]->subtopics[$j]->subtopic_name }}</li>                        
                                                    @endfor
                                                </ul>
                                                <button type="button" id="hi" class="btn weekSetting" onclick="weekSetting({{ $courses[0]->id }}, {{ $courses[0]->topics[$i]->id }})" style="width: 80%; border: none; color: #fff; font-size: 13px; background: rgb(109, 130, 74);">Week Settings</button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr> 
                                @endfor                               
                            </div>
                        </div>
            </div>
            <div class="col-lg-8" id="primary">
                    <nav style="margin-top: 20px;">
                        <div class="nav nav-tabs course-tab" id="nav-tab" role="tablist">
                            <button class="nav-link" id="nav-overview-tab" data-bs-toggle="tab" data-bs-target="#nav-overview" type="button" role="tab" aria-controls="nav-overview" aria-selected="true" style="font-size: 16px; color: rgb(109, 130, 74); background: white; width: 32%;"> Lecture Videos</button>
                            <button class="nav-link active" id="nav-syllabus-tab" data-bs-toggle="tab" data-bs-target="#nav-syllabus" type="button" role="tab" aria-controls="nav-syllabus" aria-selected="false" style="font-size: 16px; color: rgb(109, 130, 74); background: white; width: 35%;">Launch Weekly Discussion</button>
                            <button class="nav-link" id="nav-materials-tab" data-bs-toggle="tab" data-bs-target="#nav-materials" type="button" role="tab" aria-controls="nav-materials" aria-selected="false" style="font-size: 16px; color: rgb(109, 130, 74); background: white; width: 33%;">Undergoing Discussion</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade" id="nav-overview" role="tabpanel" aria-labelledby="nav-overview-tab">
                            <div class="embed-responsive embed-responsive-4by3" style="margin-top: 20px; background: #ccc; max-width: 100%; height: 410px;">
                                <video width="100%" height="410" controls>
                                    <source class="embed-responsive-item" src="/videos/courses/E-Lancing/-1624886214-3.mp4" type="video/mp4" controls="controls" autoplay="false" id="video_to_play">
                                </video>
                            </div>
                            <div class="">
                                <!-- <video class="" src="/videos/courses/E-Lancing/-1624886214-3.mp4" style="max-width: 100%; height: 200px;" allowfullscreen></video> -->
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="nav-syllabus" role="tabpanel" aria-labelledby="nav-syllabus-tab">
                            <div class="dropdown mr-1" style="margin-left: 20px;">
                                <div class="accordion" id="course_topic">
                                    @for($i = 0; $i < count($discussions); $i++)
                                        <div class="card" style="background: #fff; border: none;">
                                            <div class="card-header" id="headingOne" style="background: #fff; border: none;">
                                                <h5 class="mb-0">
                                                    <button class="btn" type="button" data-toggle="collapse" data-target="#collapse{{ $i }}" aria-expanded="true" aria-controls="collapse{{ $i }}" style="color: #000; width: 100%; text-align: left; font-size: 16px; text-decoration: none;">
                                                    Week {{ $i + 1 }} Dicussion: {{ $discussions[$i]->topic_name }} 
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapse{{ $i }}" class="collapse" aria-labelledby="heading{{ $i }}" data-parent="#course_topic">
                                                <div class="card-body" style="margin-left: 5%; ">
                                                    <small class="u-text u-text-5" style="font-size: 12px; margin-bottom: 30px;">
                                                    {{ $discussions[$i]->discussion_description }}
                                                    </small>
                                                    <button type="button" class="btn fa fa-close" style="float: right; margin-top: 30px;  width: 20%; border: none; color: #fff; font-size: 13px; background: rgb(109, 130, 74);" disabled> Close Discussion </button>
                                                </div>
                                            </div>
                                        </div>
                                        <hr style="margin-left:10px;"> 
                                    @endfor                               
                                </div>
                            </div>
                                <!-- discussions -->
                                <form method="POST" action="/admin/courses/teach/discussion" enctype="multipart/form-data" style="margin-top: 20px; margin-left: 5%; width: 80%;">
                                                    @csrf                                                   
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" id="course_id" name="course_id" value="{{ $courses[0]->id }}">  
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="lesson_name">Select the discussion week </label>
                                                        <select class="form-control" name="topic_id" id="topic_id">
                                                        @for($j = 0; $j < count($courses[0]->topics); $j++)
                                                            <option value="{{ $courses[0]->topics[$j]->id }}"> Week {{ $j + 1 }} :  {{ $courses[0]->topics[$j]->topic_name }}</option>                        
                                                        @endfor                                                        
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="lesson_description">Write dow the description of the discussion and what student expect to concentrate on</label>
                                                        <textarea class="form-control" name="dicussion_description" id="lesson_description" rows="6" placeholder="Write the description of the discussion."></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-success" style="font-weight: bold; color: #fff; width: 20%; float: right; background: rgb(109, 130, 74); border: none;"> <span class="fa fa-paper-plane" aria-hidden="true" style="color: #fff; margin-right: 10px;"></span> Send </button>
                                                    </div>
                                </form>
                        </div>
                        <div class="tab-pane fade" id="nav-materials" role="tabpanel" aria-labelledby="nav-materials-tab">
                            <div class="dropdown mr-1" style="margin-left: 20px;">
                                    <div class="accordion" id="course_topic">
                                        @for($i = 0; $i < count($discussions); $i++)
                                            <div class="card" style="background: #fff; border: none;">
                                                <div class="card-header" id="headingOne" style="background: #fff; border: none;">
                                                    <h5 class="mb-0">
                                                        <button class="btn" type="button" data-toggle="collapse" data-target="#collapse{{ $i }}" aria-expanded="true" aria-controls="collapse{{ $i }}" style="color: #000; width: 100%; text-align: left; font-size: 16px; text-decoration: none;">
                                                        Week {{ $i + 1 }} Dicussion: {{ $discussions[$i]->topic_name }} 
                                                        @if($discussions[$i]->teacher_id == Auth::user()->id)
                                                            <span style="float: right; font-size: 12px;">Posted by You</span>
                                                        @endif
                                                        </button>
                                                        
                                                    </h5>
                                                </div>
                                                <div id="collapse{{ $i }}" class="collapse" aria-labelledby="heading{{ $i }}" data-parent="#course_topic">
                                                    <div class="card-body" style="margin-left: 5%; ">
                                                        <small class="u-text u-text-5" style="font-size: 12px; margin-bottom: 30px;">
                                                        {{ $discussions[$i]->discussion_description }}
                                                        </small>
                                                        <hr>
                                                        @for($index = 0; $index < count($discussions[$i]->comments); $index++)
                                                            <div class="row" style="margin-top: 10px;">
                                                                <div class="col-1" style="height: 40px;">
                                                                    <img src="/images/logo.png" width="40" height="40" alt="" srcset="">
                                                                </div>
                                                                <div class="col-11" style="margin-top: 7px;">
                                                                    <span style="float:left; font-size: 16px; font-weight: bold;">{{ $discussions[$i]->comments[$index]->name }}</span>
                                                                    <small style="float:right;"> {{ $discussions[$i]->comments[$index]->account_type }} </small>
                                                                </div>
                                                                <div class="col-12" style="margin-left: 5%">
                                                                    <small>{{ $discussions[$i]->comments[$index]->comment_text }}</small>
                                                                </div>
                                                            </div>
                                                        @endfor
                                                        <form method="POST" action="/courses/teach/discussion/comments" enctype="multipart/form-data" style="margin-top: 20px; width: 100%;">
                                                            @csrf                                                   
                                                            <div class="form-group">
                                                                <input type="hidden" class="form-control" id="course_id" name="course_id" value="{{ $discussions[$i]->course_id }}">
                                                                <input type="hidden" class="form-control" id="topic_id" name="topic_id" value="{{ $discussions[$i]->topic_id }}"> 
                                                                <input type="hidden" class="form-control" id="discussion_id" name="discussion_id" value="{{ $discussions[$i]->id }}">   
                                                            </div>                                                    
                                                            <div class="form-group">
                                                                <label for="lesson_description">Write down your comment</label>
                                                                <textarea class="form-control" name="comment_text" id="comment_text" rows="5" placeholder="Write down your comment here..."></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-success" style="font-weight: bold; width: 20%; float: right; background: orange; border: none;"> <span class="fa fa-paper-plane" aria-hidden="true" style="color: #fff; margin-right: 10px;"></span>Send </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr style="margin-left:10px;"> 
                                        @endfor                               
                                    </div>
                                </div>
                                   
                            </div>  
                    </div>
            </div>         
            <div class="col-lg-8" id="secondary" style="display: none;">                
                <div class="materials">
                    <div class="row">
                        <div class="col-7">
                            <p style="font-weight: bold;">Create Week Objectives and Activities </p>
                        </div>
                        <div class="col-5" style="margin-top: 13px;">     
                            <button class="btn" style="color: rgb(109, 130, 74);" id="assignment">Load Assignement</button>               
                            <button class="btn btn-light" id="go_to_main" style="color: rgb(109, 130, 74); ">Go to main</button>
                        </div>
                    </div>                   
                    <hr style="height: 8px;">        
                    <div class="row border" style="padding: 10px;">
                        <div class="col-12">
                            <form method="POST" action="/teacher/courses/course_materials" enctype="multipart/form-data" style="margin-left: 5%; width: 80%;">
                                @csrf                                                    
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="setting_course_id" name="setting_course_id" value="{{ app('request')->input('course_id') }}">                                                        
                                    <input type="hidden" class="form-control" id="setting_week_id" name="setting_week_id" value="">
                                </div>
                                
                                <div class="form-group">
                                    <small>One of the very important thing in teaching is to set up the objectives of the week so that student should understand what they expect to be able to after completing this particular week,
                                    In the form bellow set up the objectives of the week and some activities that student are expected to do.</small><br>
                                    <label for="description" style="margin-top: 10px;">Week Description and Activities</label>
                                    <textarea class="form-control" name="description" id="description" rows="4" placeholder="Write down the week objectives and descriptions and what student are expecting to get after the completion of this particular lesson."></textarea>
                                </div><hr>
                                <div class="form-group">
                                    <small>You can also share lecture files (in PDF), PowerPoint presentation and notes to students.
                                    </small><br>
                                    <label for="files_data" style="margin-top: 10px;">Click on the form below to upload materials</label>
                                    <input type="file" class="form-control" name="files_data[]" id="files_data" multiple>
                                </div><hr>
                                <div class="form-group">
                                    <small>You can also add youtube videos links for additional resourses on some topics that seems to be complicated, and/or that need more attention to students. <br>
                                    <span class="text-warning" style="font-weight: bold;">Please separate the links by a semicolon </span> </small><br>
                                    <label for="additional_links" style="margin-top: 10px;">Add youtube video links</label>
                                    <input type="text" class="form-control" name="additional_links" id="additional_links" placeholder="Youtube links">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success" style="width: 20%; float: right; background: rgb(109, 130, 74); border: none;"> Save Lesson</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="assignment" style="display: none;">
                    <div class="row">
                        <div class="col-7">
                            <p style="font-weight: bold;">Create or Modify Assessmemt Questions</p>
                        </div>
                        <div class="col-5" style="margin-top: 13px;">     
                            <button class="btn" style="color: rgb(109, 130, 74);" id="material_cont">Video Lectures</button> 
                        </div>
                    </div>
                    <div class="row">
                        <form method="POST" action="/teacher/courses/create_assessement" enctype="multipart/form-data" style="margin-left: 5%; width: 80%;" class="question_wrapper">
                            @csrf                                                    
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="assignment_course_id" name="assignment_course_id" value="{{ app('request')->input('course_id') }}">                                                        
                                <input type="hidden" class="form-control" id="assignment_week_id" name="assignment_week_id" value="">
                            </div>                            
                            <hr>  
                            <div class="row questionBef" style="margin-bottom: 13px;">
                                <div class="col-12">
                                    <small>Click on the button bellow to add new question and answers. <br>You can add up to 15 questions in this week  </small>
                                    <a style="float: right; margin-top: 15px; margin-right: 20px; border: 1px solid rgb(109, 130, 74); border-radius: 3px; text-decoration: none; cursor: pointer; padding: 5px; font-size: 12px; color: rgb(109, 130, 74);" href="javascript:void(0);" class="add_question" title="Add Answers"><span class="fa fa-plus" style="margin-right: 4px;"></span>New Question</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success" style="width: 35%; float: right; background: rgb(109, 130, 74); border: none;">Save Assessmemt</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>   
            </div>
        </div>
        
    </div>
</div>
</div>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
@endsection
