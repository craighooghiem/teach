@extends('layouts.home')

@section('content')
    <div class="logo text-center">
    	<img class="center" src="{{ URL::asset('img/logo-large.png') }}" alt="EDC Logo" />
    	<h1 class="statement">Teacher Login</h1>
    </div>

    <div class="large-6 large-offset-3 columns">
	    <form class="form" method="POST" action="{{ URL::to('login') }}">
	    	<fieldset>

	    		<label>Username:</label>
	    		<input type="text" name="username" value="{{ Input::old('username') }}" />

	    		<label>Password:</label>
	    		<input type="password" name="password" />

	    		<p class="text-center" style="margin-bottom: 0;">
	    			<input type="submit" class="button" name="login" value="Login" />
	    		</p>

	    	</fieldset>
	    </form>
	</div>
@stop

@section('footer')
	<hr />
	<p style="text-align: center; color: #90C5E1;">Unauthorized access is prohibited.</p>
@stop