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

		<div class="large-12 columns">
			<h3>Observations</h3>
			<div class="columns12">
			{{ Form::open(array('classroom/student/'.$student->id.'/observation/'.$observation->id.'/goal/'.$goal->id)) }}

				<label>Observation Notes:</label>
				{{ Form::textarea('description', $observation->description) }}

				<span class="center">{{ Form::submit('Save Observation', array('class' => 'button')) }}</span>

			{{ Form::close() }}
			</div>	
		</div>

	</div>



@stop

@section('footer')
	
@stop