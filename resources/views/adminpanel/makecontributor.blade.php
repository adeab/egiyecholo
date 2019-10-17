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
					<form action="{{route('admin.storecontributor')}}" method="post" class="w3_form_post" enctype="multipart/form-data">
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
                                <input type="text" name="name" placeholder="Name" required="" value="{{$post->name}}" readonly>
							</span>
						</div>
						
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Email </label>
								<input type="email" name="email" placeholder="Email" required="" value="{{$post->email}}" readonly>
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
								<label>User Type </label>
								<input type="text" name="usertype" placeholder="Name" value="Contributor" readonly required>
							</span>
                        </div>
                        <div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>What to publish </label>
								<select name="country">
									<option value="onlythis">Only This Post</option>
									<option value="all">All Posts by this user</option>
									{{-- <option value="Contributor">Contributor</option> --}}

								</select>
							</span>
                        </div>
                    <input type="text" name="postid" value="{{$post->id}}" hidden>
						
					
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