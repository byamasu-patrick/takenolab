@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row">  

    <div class="col-lg-3">
                <div class="dropdown mr-1">
                            <div class="accordion" id="course_topic">
                                @for($i = 0; $i < count($courses->topics); $i++)
                                    <div class="card" style="background: #fff; border: none;">
                                        <div class="card-header" id="headingOne" style="background: #fff; border: none;">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $i }}" aria-expanded="true" aria-controls="collapse{{ $i }}" style="width: 100%; text-align: left; font-size: 14px; text-decoration: none;">
                                                 <span class="fa fa-assistive-listening-systems" aria-hidden="true" style="margin-right: 5px;"></span>  Week {{ $i + 1 }} : {{ $courses->topics[$i]->topic_name }} 
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse{{ $i }}" class="collapse" aria-labelledby="heading{{ $i }}" data-parent="#course_topic">
                                            <div class="card-body">
                                                <ul class="u-text u-text-5" style="margin-left: 5%; font-size: 12px;">
                                                    @for($j = 0; $j < count($courses->topics[$i]->subtopics); $j++)
                                                        <li >{{ $courses->topics[$i]->subtopics[$j]->subtopic_name }}</li>                        
                                                    @endfor
                                                </ul>
                                                <button type="button" id="week_{{ $i + 1 }}" class="btn" style="width: 80%; border: none; color: #fff; font-size: 13px; background: rgb(109, 130, 74);" disabled="true"> Start the Week</button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr> 
                                @endfor                               
                            </div>
                        </div>
    </div>
    <div class="col-lg-9">
        <nav style="margin-top: 20px;">
            <div class="nav nav-tabs course-tab" id="nav-tab" role="tablist">
                <button class="nav-link" id="nav-overview-tab" data-bs-toggle="tab" data-bs-target="#nav-overview" type="button" role="tab" aria-controls="nav-overview" aria-selected="false" style="font-size: 16px; color: rgb(109, 130, 74); background: white; width: 33%;">Week Overview</button>
                <button class="nav-link active" id="nav-videos-tab" data-bs-toggle="tab" data-bs-target="#nav-videos" type="button" role="tab" aria-controls="nav-videos" aria-selected="true" style="font-size: 16px; color: rgb(109, 130, 74); background: white; width: 32%;"> Lecture Videos</button>
                <button class="nav-link" id="nav-forum-tab" data-bs-toggle="tab" data-bs-target="#nav-forum" type="button" role="tab" aria-controls="nav-forum" aria-selected="false" style="font-size: 16px; color: rgb(109, 130, 74); background: white; width: 35%;">Discussion Forum</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade" id="nav-overview" role="tabpanel" aria-labelledby="nav-overview-tab">
                
            </div>
            <div class="tab-pane fade show active" id="nav-videos" role="tabpanel" aria-labelledby="nav-videos-tab">
                <div  style="margin-top: 10px;"><span><small style="font-size: 16px;"> {{ ($courses->topics[0]->topic_name) }}  <span class="fa fa-chevron-right"  style="margin-left: 10px;" aria-hidden="true"></span> <span id="lecture_title">{{ $videos_lecture[0]->lesson_name }}</span></small></span></div>                            
                <div class="embed-responsive embed-responsive-4by3" id="video_to_play" style="margin-top: 20px; background: #ccc; max-width: 93%; height: 410px;">
                    @for($index = 0; $index < count($videos_lecture); $index++)
                        @if($videos_lecture[$index]->played_state == FALSE)
                            <video width="100%" height="410" onloadeddata="getVideos({{ $courses }}, {{ $videos_lecture}}, {{ $index }}, {{ $videos_lecture[$index]->topic_id }})" controls>
                                <source class="embed-responsive-item" src="/videos/courses/{{ $videos_lecture[0]->course_name }}/{{ $videos_lecture[$index]->lecture_video }}" type="video/mp4" controls="controls" autoplay="false" >
                            </video>
                            @break
                        @endif 
                    @endfor                             
                </div>         
                <nav aria-label="Page navigation example" style="max-width: 93%">
                    <ul class="pagination justify-content-end">
                        <li class="page-item" style="margin-right: 40px;" >
                            <button class="page-link" id="prev" tabindex="-1" onclick="loadPreviousVideo({{ $courses }}, {{ $videos_lecture}})" style="padding-left: 20px; color: rgb(109, 130, 74);"><i class="fa fa-chevron-left" style="margin-right: 10px;" aria-hidden="true"></i>Previous</button>
                        </li>
                        <li class="page-item">
                            <button class="page-link" id="next" onclick="loadNextVideo({{ $courses }}, {{ $videos_lecture}})" style="padding-left: 25px; padding-right: 25px; color: rgb(109, 130, 74);"> Next <i class="fa fa-chevron-right"  style="margin-left: 10px;" aria-hidden="true"></i>  </button>
                        </li>
                    </ul>
                </nav>                  
            </div>
            <div class="tab-pane fade" id="nav-forum" role="tabpanel" aria-labelledby="nav-forum-tab">
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
    <div class="col-12">                    
        <div class="modal fade" id="courseSetting" tabindex="-1" role="dialog" aria-labelledby="courseSettingTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">                        
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-9">                                
                                <span class="text-lg" style="font-size: 25px; font-weight: bold; font-style: 'Comic Sans MS'"><img src="http://127.0.0.1:8000/images/logo.png" width="50" width="50" class="u-logo-image u-logo-image-1" data-image-width="64" style="margin-right: 10px; color: rgb(109, 130, 74);">  {{ Auth::user()->name }}</span>
                            </div>
                            <div class="col-3">
                                <button type="button" style="float: right; color: rgb(109, 130, 74);" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div><hr>
                        <div class="row">
                            <div class="col-12">
                                <small style="font-weight: bold;">Congratulation for finishing this week's videos. In order to continue with your learning, you first need to take this small quiz to test the knowledge
                                that you acquired in this week.</small>
                                <ul style="margin-right: 10px;">
                                    <li><small>To start your quiz click on the button below and start your quiz</small></li>
                                    <li><small>If you are not ready now, click on this link to reschedule your quiz <a href="#">Reschedule here</a>.<br>
                                    <span><span  style="margin-left: -18px; mering-right: 8px; font-size: 20px;" class="fa fa-exclamation-triangle text-warning"></span> But you will not be able to continue learning with out taking this quiz</span></small></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12"><a href="/assessment/{{ app('request')->input('course_id') }}/take?QTL={{ csrf_token() }}" id="confirm" type="button" class="btn" style="float: right; background-color: rgb(109, 130, 74); color: #fff;" class="close" data-dismiss="modal" aria-label="Close">Take the Quiz</a></div>
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection