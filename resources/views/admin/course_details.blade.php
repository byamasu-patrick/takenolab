@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row">
    @include('admin.header')
    <div class="col-10">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
            <div class="card" style="display: block;" >
                    <div class="card-body">
                        <form method="POST" action="/admin/courses" enctype="multipart/form-data">
                            @csrf
                            <div class="container" id="subtopic_add">
                                
                                <!-- <input id="_token" name="_token" type="hidden" value="{{csrf_token()}}">
                                -->
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="topic_name" type="text" placeholder="Topic Name" class="form-control @error('topic_name') is-invalid @enderror" name="topic_name" value="{{ old('topic_name') }}" required autocomplete="topic_name" autofocus>
                                            @error('topic_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>                                
                            </div> 
                            <div class="form-group row">
                                <div class="col-2"></div>
                                <div class="col-md-10">
                                    <textarea id="first_subtopic" style="height: 100px;" placeholder="First subtopic" class="form-control @error('first_subtopic') is-invalid @enderror" name="first_subtopic" value="{{ old('first_subtopic') }}" required autocomplete="first_subtopic" autofocus>
                                    </textarea>
                                    @error('first_subtopic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="form-group row">
                                <div class="col-2"></div>
                                <div class="col-md-10">
                                    <textarea id="second_subtopic" style="height: 100px;" placeholder="Second subtopic" class="form-control @error('second_subtopic') is-invalid @enderror" name="second_subtopic" value="{{ old('second_subtopic') }}" required autocomplete="second_subtopic" autofocus>
                                    </textarea>
                                    @error('second_subtopic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="form-group row">
                                <div class="col-2"></div>
                                <div class="col-md-10">
                                    <textarea id="third_subtopic" style="height: 100px;" placeholder="Third subtopic" class="form-control @error('third_subtopic') is-invalid @enderror" name="third_subtopic" value="{{ old('third_subtopic') }}" required autocomplete="third_subtopic" autofocus>
                                    </textarea>
                                    @error('third_subtopic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>                             
                            <!-- course_heading -->
                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="button" class="btn" onclick="sendFormData({{ $course_id }})" style="width: 100%; background: #6d824a; color: white;">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                            </form>
                        
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
       
    </div>
</div>
</div>
@endsection