@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row">
    @include('teacher.header')
    <div class="col-lg-10">
        <div style="max-width: 100%;">
            <div class="row">
                <div class="col-xl-10">
                <p class="text-secondary text-lg" style="font-weight: bold; font-size: 24px;"> takonoLAB as an ICT Academy</p>
                <small>Provide different courses that are not just courses  you learn and off you go, once you have chosen a particular we make sure that they you have a good experience in what you do and by the end of the 
                    course you will be able to build and take your idea to life.
                </small>
                <hr style="width: 100%; color: black; background-color:grey;" />
                    <ul class = "list-group list-group-flush" style="list-style: none; padding: 0px; margin: 0px;">
                        @for($i = 0; $i < count($courses); ++$i)
                            <li class = "c-list-data"  style="padding: 0px;">
                                <div class="row c-list-data"  style="padding: 0px; margin: 0px;">
                                <div class="col-lg-12" style="margin-top: 5px;">
                                    <div class="row c-list-data"  style="">
                                        <div class="card mb-3 c-list-data" style="max-width: 100%; border: none;">
                                            <div class="row no-gutters">
                                                <div class="col-md-4 c-list-data">
                                                <img src="{{ asset('/images/tknlb14.jpeg') }}" class="card-img" alt="Course Picture" width="100%" height="100%" style="font-size: 8px;">
                                                </div>
                                                <div class="col-md-8 c-list-data">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><span class="text" href="#" style="font-weight: bold; color: #6d824a">{{ $courses[$i]['course_name'] }} </span> <br></h5>
                                                        <p class="card-text" style="margin-bottom: 0px; padding-bottom: 0px;">{{ $courses[$i]['course_heading'] }}</p>
                                                        <p class="card-text">
                                                            <small class="text-muted" style="font-size: 14px; margin-top: 0px; padding-top: 0px;">Taught By: {{ $courses[$i]['teacher_name'] }}
                                                            <div class="">
                                                                    <a href="/teacher/courses/view?courseDetails=TRUE&courseID={{ $courses[$i]['id'] }}" type="button" class="btn btn-secondary btn-sm " id="view_course" style="text-decoration: none; font-size: 14px; padding: 8px; background: #6d824a; float: right; margin-top: 8px; margin-right: 5px;"><span class="fas fa-book" style="color: #fff;"></span> View Course</a>
                                                                </div>
                                                            </small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                       
                                </div>
                                </div>
                            </li>
                            <hr style="width: 100%; color: black; background-color:grey;" />
                        @endfor
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                    @endif
                    </ul>
                </div>
                <div class="col-xl-2" style="padding-top: 20px;">
                    <h3 class="text-secondary" style="margin: 5px; font-color: black; font-size: 18px;">Hi {{ Auth::user()->name }} !!</h3>
                    <small>You might have new notification from the class forum and form other people.</small>
                    <div class="list-group list-group-flush" style="font-size: 14px;">
                       
                        <a href="#" class="list-group-item list-group-item-action">Brainstorming...</a>
                        <a href="#" class="list-group-item list-group-item-action">Developing a business model...</a>
                        <a href="#" class="list-group-item list-group-item-action">Creating your own startup...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection