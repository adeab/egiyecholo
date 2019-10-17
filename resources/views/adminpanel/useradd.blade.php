@extends('layouts.admin')
@section('page_title')
User Add   
@endsection

<!-- //js -->
<!-- font-awesome-icons -->
<!-- //font-awesome-icons -->

<!-- js -->


<!-- banner -->
@section('body_content')
<link href="{{ asset('backend/adduser/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <div class="center-container">
	<div class="banner-dott" style="height: 100%;">
		<div class="main">
			
				<div class="w3layouts_main_grid">
					<form action="{{route('users.store')}}" method="post" class="w3_form_post" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Profile Image: </label>
								<input type="file" name="user_image">
							</span>
						</div>
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Name </label>
								<input type="text" name="name" placeholder="Name" required="">
							</span>
						</div>
						
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Email </label>
								<input type="email" name="email" placeholder="Email" required="">
							</span>
						</div>
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Phone Number </label>
								<input type="number" name="number" placeholder="Phone Number" required="">
								</span>
                        </div>
                        <div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Password </label>
								<input type="password" name="password" placeholder="Password" required="">
								</span>
						</div>
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Select Category </label>
								<select name="country">
									<option value="none" selected="" disabled="">Select Category</option>
									<option value="Admin">Admin</option>
									<option value="Editor">Editor</option>
									<option value="Contributor">Contributor</option>

								</select>
							</span>
						</div>
						
					
					<div class="w3_main_grid">
						<div class="w3_main_grid_right">
							<input type="submit" value="Submit">
						</div>
					</div>
				</form>
			</div>
		
			
		</div>
	</div>
	</div>
<!-- //footer -->
@endsection