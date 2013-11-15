@extends('layouts.home')

@section('content')
    <div class="large-12 columns">
    	<img style="margin: 10px auto 0 auto; display: block;" src="{{ URL::asset('img/logo-large.png') }}" alt="EDC Logo" />
    </div>

	<div class="large-12 columns">
		<hr />
		<h4>Classroom Manager</h4>
		<hr />

		<div class="row">
		@foreach($classrooms as $classroom)
			<div class="large-3 columns th panel left iconbox">
				<a href="{{ URL::to('classroom/'.$classroom->id) }}" title="Classroom - {{ $classroom->id }}">
					<img src="http://images3.wikia.nocookie.net/__cb20131023173424/farmville/images/c/cc/Giant_Haunted_Owl_Tree-icon.png" />
					<p class="center">
						{{ $classroom->title }}
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