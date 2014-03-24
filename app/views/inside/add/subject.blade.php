@extends('layouts.inside')

@section('content')

	<div class="sidebar">
		<ul>
		@foreach($students as $stud)
			@if($stud->id == $student->id)
			<a href="{{ URL::to('classroom/student/'.$stud->id) }}" class="active">
			@else
			<a href="{{ URL::to('classroom/student/'.$stud->id) }}">
			@endif
				<li>
					<img src="https://cdn1.iconfinder.com/data/icons/zoomeyed/devid.png" /> 
					<span>
						{{ $stud->fname }} {{ $stud->lname }}
					</span>
				</li>
			</a>
		@endforeach
		</ul>
	</div>

	<div class="inside-page">

	    <div class="large-12 columns">
	    	<img style="margin: 0px auto 0 auto; display: block;" src="{{ URL::asset('img/logo-large.png') }}" alt="EDC Logo" />
	    </div>

		<h5>Add New Subject</h5>
		{{ Form::open(array('url' => 'classroom/student/'.$student->id.'/subject/add')) }}

			<label>Subject Name:</label>
			{{ Form::input('text', 'subject_name') }}

			{{ Form::submit('Create New Subject', array('class' => 'button small', 'method' => 'POST')) }}

		{{ Form::close() }}

		<br style="clear: both;" />

		<div class="large-12 columns">
			<h3>
				Add Existing Subject for {{ $student->fname }}
			</h3>
			@foreach($subjects as $subj)
				<div class="large-2 columns th panel left iconbox">
					<a href="{{ URL::to('classroom/student/'.$student->id.'/subject/add/'.$subj->id) }}" title="Subject - {{ $subj->id }}">
						
						<p class="center">
							{{ $subj->name }}
						</label>
					</a>
				</div>
			@endforeach
		</div>

	</div>



@stop

@section('footer')
	
@stop