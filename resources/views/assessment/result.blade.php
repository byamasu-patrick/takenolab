@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-12">
    <div class="row">
        <div class="col-12">
            @if($result >= 70)                
                <p style="font-size: 24px; font-weight: bold;">Congratulation {{ Auth::user()->name }}</p>
                <p>You have passed the quiz, your is result is <span style="font-size: 28px; font-weight: bold;">{{ (double) $result }} %</span></p>
            @else
                <p style="font-size: 28px; font-weight: bold;">Sorry {{ Auth::user()->name }}</p>
                <p>You have failed the quiz with <span style="font-size: 24px; font-weight: bold;">{{ (double) $result }} %</span>, you will be able to retake the quiz after 24hours from now. </p>
            @endif
            <a href="/student/courses/learn?course_id={{ $course_id }}&token={{ csrf_token() }}" class="text u-button-col"> Continue Learning</a>
        </div>
    </div>
    </div>
</div>

</div>
@endsection