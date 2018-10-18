@extends('lib/admin_layout')
    @section('admin_content')
    <div class="container">
    <div class="row profile">
		<div class="col-md-4">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="{{ asset('uploads/files/' . $user->image) }}"  width="100px" height="100px" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
                        {{$user->name}}
 					</div>
					<div class="profile-usertitle-job">
                    {{$user->email}}
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a onclick="showDiv()"  >
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Tasks </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
			<div class="col-md-8 profile_edit">
				
					<div class="profile-content">	
					<form  method="POST" action="{{url('/update_user', $user->id)}}"   enctype="multipart/form-data">		
					@csrf

						<div class="col-md-7">
							<ul>
								<li class="active">
									<a><h4>Profile Setting </h4>
									<i class="glyphicon glyphicon-user"> Profile Image</i>
									<div class="">
									<img id="blah" height="150px;" src="{{ asset('uploads/files/' . $user->image) }}"alt="your image" />	
									<input type='file' name="image" onchange="readURL(this);" />			
									</div></a>
								</li>
								<li class="active">
									<a >
									<i class="glyphicon glyphicon-user"> Name</i>
									<input type="text"  class="form-control" name="name" value="{{$user->name}}"></a>
								</li>
								<li class="active">
									<a><i class="glyphicon glyphicon-user"> Email</i>
									<input type="text"  class="form-control"  name="email" value="{{$user->email}}"></a>
								</li>
								<li class="active">
									<a><i class="glyphicon glyphicon-user">New Password</i>
									<input type="password"  class="form-control"  name="password"  value="{{$user->password}}"></a>
								</li>
							</ul>
							<!-- <a href="{{$user->id}}" type="submit" class="btn btn-success btn-sm">Update</a> -->
							<button type="submit" class="btn btn-success btn-sm" >Update Task</button>
						</div>
						</form>
					</div>
				
			</div>
	</div>
</div>
    @endsection()