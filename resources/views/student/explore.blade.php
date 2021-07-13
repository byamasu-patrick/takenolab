@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('student.header')
        <div class="col-lg-10">
            <ul class = "list-group" style="list-style: none; padding: 0px; margin: 0px;">
                    @for($i = 0; $i < count($courses); ++$i)
                        <li class = ""  style="padding: 0px;">
                            <div class="row"  style="padding: 0px; margin: 0px;">
                            <div class="col-lg-12" style="margin-top: 5px;">
                                <div class="row"  style="">
                                <div class="card mb-3" style="max-width: 100%; border: none;">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                    <img src="{{ asset('/images/tknlb14.jpeg') }}" class="card-img" alt="Course Picture" width="100%" height="100%" style="font-size: 8px;">
                                    </div>
                                    <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><span class="text" href="#" style="font-weight: bold; color: #6d824a">{{ $courses[$i]['course_name'] }} </span> <br></h5>
                                        <p class="card-text" style="margin-bottom: 0px; padding-bottom: 0px;">{{ $courses[$i]['course_heading'] }}</p>
                                        <p class="card-text">
                                            <small class="text-muted" style="font-size: 14px; margin-top: 0px; padding-top: 0px;">Taught By: {{ $courses[$i]['teacher_name'] }}
                                               <div class="">
                                                    <a href="/student/courses/view?courseDetails=TRUE&courseID={{ $courses[$i]['id'] }}" type="button" class="btn btn-secondary btn-sm " id="view_course" style="text-decoration: none; font-size: 14px; padding: 8px; background: #6d824a; float: right; margin-top: 8px; margin-right: 5px;"><span class="fas fa-book" style="color: #fff;"></span> View Course</a>
                                                </div>
                                            </small>
                                        </p>
                                    </div>
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
    </div>
</div>
</div>
@endsection