@extends('layouts.layout')
@section('main')
<div id="login-page">
	<div class="container">
		<form class="form-login" method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
    		@csrf
		    <h2 class="form-login-heading">Create Account</h2>
		    <div class="login-wrap">
		        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  placeholder="User name" required autofocus >
		        @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('name') }}</strong> </span>
                @endif <br>
				<input  id="email" type="email" class="form-control"  name="email" value="{{ old('email') }}" placeholder="Email">
		        @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert"> <strong>{{ $errors->first('email') }}</strong> </span>
                @endif <br>
				<input  id="image" type="file" class="form-control"  name="image">
		        @if ($errors->has('image'))
                <span class="invalid-feedback" role="alert"> <strong>{{ $errors->first('email') }}</strong> </span>
                @endif <br>
		    	<input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
				@if ($errors->has('password'))
                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password') }}</strong> </span>
                @endif <br>
		        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required></br>
		       	<button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Create</button>
		       	<div class="registration">
		            Have an account ?<br/><a class="" href="{{ route('login') }}"> Login</a>
		        </div>
		    </div>
		</form>	  	
	</div>
</div>
@endsection


@section('login')
   	<script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>
@endsection