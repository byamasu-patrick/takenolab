@extends('layouts.app')

@section('content')
<div class="container-fluid">
<link rel="stylesheet" href="{{ asset('css/entrepreneurship.css') }}" media="screen">
    <div class="row" style="padding: 0px; margint: 0px;">
        <div class="col-12" style="padding: 0px; margint: 0px;">
        <a href="/student/courses/enroll?course_id={{ $courses->id }}" class="btn kc_fab_main_btn">Enroll to Course</a>
           
            <section class="u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-clearfix u-image u-shading u-section-1" id="sec-d97f" data-image-width="960" data-image-height="432">
                <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
                    <h1 class="u-align-center u-custom-font u-font-source-sans-pro u-text u-text-body-alt-color u-title u-text-1">{{ $courses->course_name }} </h1>
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
            <section class="u-align-center u-clearfix u-white u-section-3" id="carousel_3284">
                <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
                    <h1 class="u-text u-text-1">Topics Covered in Entrepreneurship</h1>
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
            <section class="u-clearfix u-white u-section-4" id="carousel_22b3">
                <div class="u-clearfix u-sheet u-sheet-1">
                    <div class="u-custom-color-5 u-shape u-shape-circle u-shape-1"></div>
                    <h2 class="u-text u-text-1">Bold steps forward<br>
                    </h2>
                    <ul class="u-text u-text-2">
                    <li>Courses like these are not designed to be something that you just attend and get certificate. It is hand on experience course</li>
                    <li>You do not need any technical skills or a marketing degree to apply. It is assumed.</li>
                    <li>We recommend that you begin this course with an idea or project you wish to incubate.</li>
                    <li>You will learn how to Pitch through observing a live pitch by an entrepreneur.</li>
                    <li>It helps if you are actually interested in your customers.</li>
                    </ul>
                </div>
            </section>
        </div>
    </div>
</div>
<footer class="u-align-center u-clearfix u-custom-color-3 u-footer u-footer" id="sec-b579"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">copyright of takenoLAB&nbsp;2015</p>
      </div></footer>
     

<link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Ubuntu:300,300i,400,400i,500,500i,700,700i|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
@endsection