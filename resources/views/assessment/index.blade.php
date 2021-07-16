@extends('layouts.app')

@section('content')
<div class="container">

<div class="row">
    <div class="col-12">
    <div class="row">
        <div class="col-12">
           <p style="font-size: 24px; font-weight: bold;">Assessment Instructions</p>
            <ol class="list-group">
                <li style="margin: 10px 10px;">Do not	send out electronic	files	of	the	exam</li>
                <li style="margin: 10px 10px;">Do not	post the answers	to	the	exam until the	exam deadline	is	over</li>
                <li style="margin: 10px 10px;"> Do	not	keep	your	exams	available	or	open for	extended	periods	of	time so	that students	don’t	have	time	to	look	up	
                answers	to	questions	before	they	take	the	exam.</li>
                <li style="margin: 10px 10px;">Present	exam	questions	one	at	a	time	as	
                opposed	to	having	all	questions	posted.		
                This	makes	it	more	difficult	to	make	a	
                screenshot.		Students	would	still	be	able	to	
                copy	and	paste	each	question	into	a	word	
                doc	or	screenshot	every	question	
                individually.</li>
                <li style="margin: 10px 10px;">The	exam	should	be	timed	and	only	allow	
                enough	time for	students	who	know	the	
                material	to	answer	the	questions without	
                looking	up	answers	online	or	in	notes.		</li>
                <li style="margin: 10px 10px;">Do	not	allow	backtracking	so	that	students	
                cannot	quickly go	through	the	exam	and	
                then	go	back	and	start	looking	up	the	
                answers	to	all	of	the	questions.       </li>
                <li style="margin: 10px 10px;">Time	the	exam more	stringently.		Only	
                keep	the	exam	open	long	enough	for	
                students	who	know	the	material	to	answer	
                the	questions based	on	what	they	know	
                and	not	by	looking	up	answers.		</li>
            </ol>
        </div>
    </div> 
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-12">
            <a href="/assessment/{{ $course_id }}/{{ $topic_id }}/start?QTL={{ csrf_token() }}" id="confirm" type="button" class="btn" style="float: right; background-color: rgb(109, 130, 74); margin-right: 10%; color: #fff; width: 10%;" class="close" data-dismiss="modal" aria-label="Close">Start</a>
        </div>
    </div>
    </div>
</div>

</div>
@endsection