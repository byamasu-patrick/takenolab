@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-12">
    <div class="row">
        <div class="col-12">
           <p style="font-size: 24px; font-weight: bold;">Questions</p>
           <form action="/assessment/{{ $course_id }}/{{ $topic_id }}/result" method="POST">      
                {{ csrf_field() }}       
                @for($index = 0; $index < count($questions); $index++)
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="form-check form-switch">
                                    <label for="questions"><span>{{ $index + 1 }}.</span> {{ $questions[$index]->question }}</label>                        
                                    <input type="hidden" class="form-control" name="questions[]" value="{{ $questions[$index]->id }}"/>
                                </div>                    
                            </div>                            
                            <div class="row" style="margin-left: 7%;">
                                <div class="form-check form-switch" style="max-width: 20%; margin-left: 15px; margin-bottom:5px; float: left;">
                                    <input  type="radio" class="form-check-input" name="answer{{  $questions[$index]->id }}" value="{{ $questions[$index]->first_answer }}">
                                    <label class="form-check-label" style="font-size: 14px; margin-right: 5px; margin-left: 3px;" for="answer{{ $questions[$index]->id }}">{{ $questions[$index]->first_answer }}</label>        
                                </div>                    
                            </div>
                            <div class="row" style="margin-left: 7%;">
                                <div class="form-check form-switch" style="max-width: 20%; margin-left: 15px; margin-bottom:5px; float: left;">
                                    <input type="radio" class="form-check-input" name="answer{{  $questions[$index]->id }}" value="{{ $questions[$index]->second_answer }}">
                                    <label class="form-check-label" style="font-size: 14px; margin-right: 5px; margin-left: 3px;" for="answer{{ $questions[$index]->id }}">{{ $questions[$index]->second_answer }}</label>                       
                                </div>                    
                            </div>
                            <div class="row" style="margin-left: 7%;">
                                <div class="form-check form-switch" style="max-width: 20%; margin-left: 15px; margin-bottom:5px; float: left;">
                                    <input type="radio" class="form-check-input" name="answer{{  $questions[$index]->id }}" type="radio" value="{{ $questions[$index]->third_answer }}">
                                    <label class="form-check-label" style="font-size: 14px; margin-right: 5px; margin-left: 3px;" for="answer{{ $questions[$index]->id }}">{{ $questions[$index]->third_answer }}</label>                       
                                </div>                    
                            </div>
                            <div class="row" style="margin-left: 7%;">
                                <div class="form-check form-switch" style="max-width: 20%; margin-left: 15px; margin-bottom:5px; float: left;">
                                <input type="radio" class="form-check-input" name="answer{{  $questions[$index]->id }}" type="radio" value="{{ $questions[$index]->fourth_answer }}">
                                <label class="form-check-label" style="font-size: 14px; margin-right: 5px; margin-left: 3px;" for="answer{{ $questions[$index]->id }}">{{ $questions[$index]->fourth_answer }}</label>                                         
                                </div>                    
                            </div>
                        </div>
                    </div>
                @endfor
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-12">
                        <button type="submit" id="submit-quiz" class="u-button-col">Submit Answers</button>
                    </div>
                </div>   
           </form>  
                  
        </div>
    </div>
    </div>
</div>

</div>
@endsection