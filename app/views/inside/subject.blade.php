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
			<h3>Goals &amp; Objectives</h3>
			@foreach($goals as $goal)
				<div class="large-12 columns">
					<h5>{{ $goal->name }}</h5>

					<table class="observations">
						<thead>
							<tr>
								<th>Observation</th>
								<th>Date Created</th>
							</tr>
						</thead>
						<tbody>
						@if(count($goal->observations) > 0)
							@foreach($goal->observations as $obs)
								<tr class="obsRow" href="{{ URL::to('classroom/student/'.$student->id.'/observation/'.$obs->id.'/goal/'.$goal->id) }}">
									<td width="75%">
										{{ $obs->description }}
										<strong style="display: block;">Next Steps</strong>
										@foreach($obs->steps() as $step)
										<p>
											<span class="right">
												<a href="{{ URL::to('classroom/student/'.$student->id.'/observation/'.$obs->id.'/goal/'.$goal->id) }}/observation/add"><img src="{{ URL::asset('img/add.png') }}" /></a>
											</span>
											{{ $step->description }}
										</p>
									</td>
									<td>{{ $obs->created_at }}</td>
								@endforeach
								</tr>
								
							@endforeach
						@endif
						</tbody>
					</table>

				</div>
			@endforeach
		</div>

	</div>

	<script>
	$(document).ready(function(){
		$('.obsRow').click(function(){
			window.document.location = $(this).attr("href");
		});
	});
	</script>

@stop

@section('footer')
	
@stop