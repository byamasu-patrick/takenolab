@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">        
        <link rel="stylesheet" href="{{ asset('css/entrepreneurship.css') }}" media="screen">
        @include('admin.header')
        <div class="col-10">
            <div class="row" style="height: 180px; text-align: center; background: orange">
                <div class="col-12">
                    <h1 style="color:white; font-weight: bold; "> {{ $courses->course_name }} </h1>
                    <a href="http://" class="btn btn-lg" style="background: rgb(109, 130, 74); color:white; margin-top: 30px;" target="_blank" rel="noopener noreferrer">View Enrolled</a>
                </div>                
            </div>
            <div class="row"  style="margin-top: 20px;">
                <div class="col-12">
                    <nav>
                        <div class="nav nav-tabs course-tab" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-overview-tab" data-bs-toggle="tab" data-bs-target="#nav-overview" type="button" role="tab" aria-controls="nav-overview" aria-selected="true" style="color: rgb(109, 130, 74); background: white; width: 30%;">Course Overview</button>
                            <button class="nav-link" id="nav-syllabus-tab" data-bs-toggle="tab" data-bs-target="#nav-syllabus" type="button" role="tab" aria-controls="nav-syllabus" aria-selected="false" style="color: rgb(109, 130, 74); background: white; width: 30%;">Course Syllabus</button>
                            <button class="nav-link" id="nav-materials-tab" data-bs-toggle="tab" data-bs-target="#nav-materials" type="button" role="tab" aria-controls="nav-materials" aria-selected="false" style="color: rgb(109, 130, 74); background: white; width: 30%;">Course Materials</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-overview" role="tabpanel" aria-labelledby="nav-overview-tab">
                            <section style="margin-top: 20px;" class="u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-clearfix u-image u-shading u-section-1" id="sec-d97f" data-image-width="960" data-image-height="432">
                                <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
                                    <h3 class="u-align-center u-custom-font u-font-montserrat u-text u-text-body-alt-color u-text-2">{{ $courses->course_heading }}</h3>
                                    <p class="u-align-center u-text u-text-body-alt-color u-text-3">{{ $courses->course_overview }}&nbsp;</p>
                                </div>
                            </section>
                            <section class="u-align-center-md u-align-center-sm u-align-center-xs u-clearfix u-white u-section-2" id="carousel_f7a7">
                                <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
                                    <img src="/images/tknlb14.jpeg" alt="" class="u-image u-image-default u-image-1" data-image-width="960" data-image-height="432">
                                    <div class="u-list u-list-1">
                                    <div class="u-repeater u-repeater-1">
                                        <div class="u-align-left u-container-style u-list-item u-repeater-item u-white u-list-item-1">
                                            <div class="u-container-layout u-similar-container u-container-layout-1">
                                                <h4 class="u-text u-text-1">{{ $courses->title_catching_area_one }}</h4>
                                                <p class="u-text u-text-2"> {{ $courses->course_catching_area_one }} </p>
                                            </div>
                                        </div>
                                        <div class="u-align-left u-container-style u-list-item u-repeater-item u-video-cover u-white u-list-item-2">
                                            <div class="u-container-layout u-similar-container u-container-layout-2">
                                                <h4 class="u-text u-text-3" style="font-weight: 700; text-transform: uppercase; letter-spacing: 2px; margin: 0px;">{{ $courses->title_catching_area_two }}</h4>
                                                <p class="u-text u-text-4">{{ $courses->course_catching_area_two }}<br>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="u-align-left u-container-style u-list-item u-repeater-item u-video-cover u-white u-list-item-3">
                                            <div class="u-container-layout u-similar-container u-container-layout-3">
                                                <h4 class="u-text u-text-5">{{ $courses->title_catching_area_three }}</h4>
                                                <p class="u-text u-text-6">{{ $courses->course_catching_area_three }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <p class="u-text u-text-7">Image from <a href="https://www.freepik.com/free-photos/man" class="u-border-1 u-border-white u-btn u-button-style u-none u-text-body-alt-color u-btn-1">Freepik</a>
                                    </p>
                                </div>
                            </section>
                        </div>
                        <div class="tab-pane fade" id="nav-syllabus" role="tabpanel" aria-labelledby="nav-syllabus-tab">
                            <section style="margin-left: 20px;" class="u-align-center u-clearfix u-white u-section-3" id="carousel_3284">
                                <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
                                    <h1 class="u-text u-text-1">Topics Covered in {{ $courses->course_name }}</h1>
                                    <p class="u-text u-text-2">“The more you know about your industry, the more advantage and protection you will have.”— Tim Berry | Founder of Palo Alto Software</p>
                                    <div class="u-expanded-width u-list u-list-1">
                                    <div class="u-repeater u-repeater-1">
                                        @for($i = 0; $i < count($courses->topics); $i++)
                                            <div class="u-align-left u-container-style u-list-item u-repeater-item">
                                                <div class="u-container-layout u-similar-container u-container-layout-1">
                                                    <div class="u-align-center u-container-style u-custom-color-5 u-group u-radius-50 u-shape-round u-group-1">
                                                    <div class="u-container-layout u-valign-middle u-container-layout-2">
                                                        <p class="u-custom-font u-font-ubuntu u-text u-text-3">{{ $i + 1 }}</p>
                                                    </div>
                                                    </div>
                                                    <div class="u-container-style u-group u-group-2">
                                                    <div class="u-container-layout u-container-layout-3">
                                                        <h4 class="u-text u-text-4"> {{ $courses->topics[$i]->topic_name }} </h4>
                                                        <ul class="u-text u-text-5">
                                                            @for($j = 0; $j < count($courses->topics[$i]->subtopics); $j++)
                                                                <li>{{ $courses->topics[$i]->subtopics[$j]->subtopic_name }}</li>                        
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor                                        
                                    </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="tab-pane fade" id="nav-materials" role="tabpanel" aria-labelledby="nav-materials-tab">

                        <div class="dropdown mr-1">
                            <div class="accordion" id="course_topic">
                                @for($i = 0; $i < count($courses->topics); $i++)
                                    <div class="card" style="background: #fff; border: none;">
                                        <div class="card-header" id="headingOne" style="background: #fff; border: none;">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $i }}" aria-expanded="true" aria-controls="collapse{{ $i }}" style="width: 100%; text-align: left; font-size: 22px; text-decoration: none;">
                                                 <span class="fa fa-assistive-listening-systems" aria-hidden="true" style="margin-right: 20px;"></span>  Week {{ $i + 1 }} : {{ $courses->topics[$i]->topic_name }} 
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse{{ $i }}" class="collapse" aria-labelledby="heading{{ $i }}" data-parent="#course_topic">
                                            <div class="card-body">
                                                <ul class="u-text u-text-5" style="margin-left: 5%;">
                                                    @for($j = 0; $j < count($courses->topics[$i]->subtopics); $j++)
                                                        <li >{{ $courses->topics[$i]->subtopics[$j]->subtopic_name }}</li>                        
                                                    @endfor
                                                </ul>
                                                <p style="margin-left: 5%;">Make the course very enjoyable to students by addding new materials in the course for each and every week.
                                                    Upload video lectures, lesson objective and description.
                                                </p>
                                                <form method="POST" action="/admin/courses/course_materials" enctype="multipart/form-data" style="margin-left: 5%; width: 80%;">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="lesson_name">Lesson Name</label>
                                                        <input type="text" class="form-control" name="lesson_name" id="lesson_name" placeholder="Enter the lesson name">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" id="course_id" name="course_id" value="{{ $courses->id }}">                                                        
                                                        <input type="hidden" class="form-control" id="topic_id" name="topic_id" value="{{ $courses->topics[$i]->id }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="lesson_name">Select the subtopic under which the lesson belong to </label>
                                                        <select class="form-control" name="subtopic" id="subtopic">
                                                        @for($j = 0; $j < count($courses->topics[$i]->subtopics); $j++)
                                                            <option value="{{ $courses->topics[$i]->subtopics[$j]->id }}">{{ $courses->topics[$i]->subtopics[$j]->subtopic_name }}</option>                        
                                                        @endfor
                                                        
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="lesson_description">Lesson Description and Objective</label>
                                                        <textarea class="form-control" name="lesson_description" id="lesson_description" rows="4" placeholder="Write down the lecture objective and description and what student are expecting to get after the completion of this particular lesson."></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="lesson_video">Select the Video Lecture </label>
                                                        <input type="file" class="form-control" name="lesson_video" id="lesson_video">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-success" style="width: 20%; float: right; background: rgb(109, 130, 74); border: none;"> Save Lesson</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> 
                                @endfor                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection