@extends('layouts.layout')
@section('main')
 <section id="main-content">
          <section class="wrapper">
<div id="login-page">
	<div class="container">
		<form class="form-login" method="POST" action="{{ route('login') }}">
		@csrf
		    <h2 class="form-login-heading">Log in</h2>
		    <div class="login-wrap">   
				<br>
				<input id="email" type="email"  placeholder="User Email" class="form-control"  name="email" value="{{ old('email') }}" required autofocus>
				@if ($errors->has('email'))
				<span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong></span>
				@endif<br>
				<input id="password" type="password" class="form-control" placeholder="Password"  name="password" required>
				@if ($errors->has('password'))
				<span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password') }}</strong></span>
				@endif<br>		      
				<button class="btn btn-theme btn-block"  type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
				<div class="registration"> Don't have an account yet?<br/>
				<a href="{{ route('register') }}">Create an account</a>
				</div>
		    </div>
		</form>	  	
	  	</div>
	  </div>
	</section>
</section>
@endsection


@section('login')
  <!--  <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script> -->
@endsection