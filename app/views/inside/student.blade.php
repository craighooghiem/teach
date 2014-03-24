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

		<span class="right">
			<a href="{{ URL::to('classroom/student/'.$student->id.'/subject/add') }}" class="button small">Add Subject</a>
		</span>

		<div class="large-12 columns">
			<h3>
				Subjects
			</h3>
			@foreach($student->subjects as $subj)
				<div class="large-2 columns th panel left iconbox">
					<a href="{{ URL::to('classroom/student/'.$student->id.'/subject/'.$subj->id) }}" title="Subject - {{ $subj->id }}">
						<img src="http://images.wikia.com/farmville/images/d/d3/White_Horned_Owl-icon.png" class="center" />
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