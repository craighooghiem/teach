@extends('layouts.home')

@section('content')
    <div class="large-12 columns">
    	<img style="margin: 10px auto 0 auto; display: block;" src="{{ URL::asset('img/logo-large.png') }}" alt="EDC Logo" />
    </div>

	<div class="large-12 columns">
		<hr />
		<h4>Classroom Manager - {{ $classroom->title }}</h4>
		<hr />

		<div class="row">
			<h3>Students</h3>
		@foreach($students as $student)
			<div class="large-2 columns th panel left iconbox">
				<a href="{{ URL::to('classroom/student/'.$classroom->id) }}" title="Classroom - {{ $classroom->id }}">
					<img src="https://cdn1.iconfinder.com/data/icons/zoomeyed/devid.png" class="center" />
					<p class="center">
						{{ $student->fname }} {{ $student->lname }}
					</label>
				</a>
			</div>
		@endforeach
		</div>

	</div>

@stop

@section('footer')
	<p style="text-align: center; color: #90C5E1;">Beta Release 0.1</p>
@stop