@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row">
    @include('admin.header')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <div class="col-lg-10">
        <div class="row" style="margin-top: 10px;">
            <div class="col-lg-5 border" style="margin-left: 20px; overflow: auto; height: 800px; margin-bottom: 20px;">
                <div class="">
                    <span class="btn material-icons-outlined">Courses Offered</span>                   
                        <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#" class="u-image u-logo u-image-1" data-image-width="500" data-image-height="500">
                                        <img src="{{ asset('images/logo.png') }}" width="50" height="50" class="u-logo-image u-logo-image-1" data-image-width="64">
                                        </a>
                                    </div>
                                    <div class="col-8">
                                        <h5 class="modal-title" id="exampleModalLabel" style="margin-left: 30px; padding-top: 10px;">Teachers</h5>
                                    </div>
                                    <hr>
                                   
                                </div>
                                
                            </div>
                            <div class="row">
                                    <div class="col-12">
                                        <ul class="list-group" id="teacher_list" style="list-style-type: none;">
                                           
                                        </ul>
                                       
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                        </div>
                </div>
                <ul class = "list-group" style="list-style: none; padding: 0px; margin-left: 10px;">
                    @for($i = 0; $i < count($courses); ++$i)
                        <li class = "c-list-data"  style="padding: 0px;">
                            <div class="row"  style="padding: 0px; margin: 0px;">
                            <div class="col-lg-12" style="margin-top: 5px;">
                                <div class="row c-list-data"  style="">
                                <div class="card mb-3" style="max-width: 100%; border: none;">
                                <div class="row no-gutters">
                                    <div class="col-md-4 c-list-data">
                                    <img src="{{ asset('/images/tknlb14.jpeg') }}" class="card-img" alt="Course Picture" width="100%" height="100%" style="font-size: 8px;">
                                    </div>
                                    <div class="col-md-8 c-list-data" id="c-list-data">
                                        
                                            <div class="card-body">
                                                <h5 class="card-title"><span class="text" href="#" style="font-weight: bold; color: #6d824a">{{ $courses[$i]['course_name'] }} </span> <br></h5>
                                                <p class="card-text"><a href="/admin/courses/course_materials?course_id={{ $courses[$i]['id'] }} " style="text-decoration: none;">{{ $courses[$i]['course_heading'] }}
                                        </a></p>
                                                <p class="card-text">
                                                    <small class="text-muted" style="font-size: 14px;">Taught By: {{ $courses[$i]['teacher_name'] }} <br>
                                                    <div class="dropdown">
                                                            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenu{{ $courses[$i]['id'] }}"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: #6d824a; float: right; margin-top: 8px; margin-right: 5px;">Setting</button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu{{ $courses[$i]['id'] }}">
                                                                <li><button class="dropdown-item" type="button" onclick="getTeachers({{ $courses[$i]['id'] }})" data-toggle="modal" data-target="#form">Assign to Teacher</button></li>
                                                                <li><button class="dropdown-item" type="button" onclick="getStudents({{ $courses[$i]['id'] }})" data-toggle="modal" data-target="#form">Assign to Students</button></li>
                                                                <li><button class="dropdown-item" type="button" onclick="">Edit Course</button></li>
                                                                <li><button class="dropdown-item" type="button" onclick="">View Course</button></li>
                                                                <li><button class="dropdown-item" type="button" onclick="">Hide Course</button></li>
                                                            </ul>
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
            <div class="col-lg-6">  
                <small>You add new courses here, student will be able to see the newly added courses. Oonce you add a course, the course will have a default visibility that is hidden. <br>
                After adding a course, you will be required to also add set its visibility to "Visible" so that it should be visible to everyone </small>             
                <div class="card" id="edit_acc" style="display: block;" >
                    <div class="card-body">
                        <form method="POST" action="/admin/courses" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="course_name" type="text" placeholder="Course Name" class="form-control @error('name') is-invalid @enderror" name="course_name" value="{{ old('course_name') }}" required autocomplete="course_name" autofocus>

                                    @error('course_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                            <div class="col-md-12">
                                    <div class="btn btn-success btn-sm float-left" style="background: #6d824a">
                                    <span>Choose the image/video of the course</span>
                                    <input type="file" name="course_image" id="course_image" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="course_heading" type="text" placeholder="Main heading for the overview of the course" class="form-control @error('course_main_title') is-invalid @enderror" name="course_heading" value="{{ old('course_heading') }}" required autocomplete="course_heading">

                                    @error('course_heading')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea id="course_overview" name="course_overview" style="height: 100px;" class="form-control" placeholder="Describe the overview of the course, what student who will take this course are expecting to be able to do after completing the course.">
                                    </textarea>
                                    @error('course_overview')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="text" id="title_catching_area_one" class="form-control" name="title_catching_area_one" placeholder="Describe the heading for the first catching area of the course">
                                    @error('title_catching_area_one')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea id="course_catching_area_one" name="course_catching_area_one" class="form-control" placeholder="Describe the first catching area of the course">
                                    </textarea>
                                    @error('course_catching_area_one')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="text" id="title_catching_area_two" placeholder="Describe the heading for the second catching area of the course" class="form-control @error('title_catching_area_two') is-invalid @enderror" name="title_catching_area_two" value="{{ old('title_catching_area_two') }}" required autocomplete="title_catching_area_two">
                                   @error('title_catching_area_two')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea id="course_catching_area_two" class="form-control" name="course_catching_area_two" placeholder="Describe the first catching area of the course">
                                    </textarea>
                                    @error('course_catching_area_two')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="text" id="title_catching_area_three" name="title_catching_area_three" class="form-control" placeholder="Describe the first catching area of the course">
                                    @error('title_catching_area_three')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea id="course_catching_area_three" placeholder="Describe the third catching area of the course" class="form-control @error('course_catching_area_three') is-invalid @enderror" name="course_catching_area_three" value="{{ old('course_catching_area_three') }}" required autocomplete="course_catching_area_three">
                                    </textarea>
                                    @error('course_catching_area_three')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- course_heading -->
                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn" style="width: 100%; background: #6d824a; color: white;">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                            </form>
                        
                    </div>
                </div>
        </div>
        </div>
       
    </div>
</div>
</div>
@endsection