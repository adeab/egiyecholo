@extends('layouts.admin')
@section('page_title')
Change Password    
@endsection
@section('body_content')
<div class="graphs">

    <form action="{{route('admin.update_password')}}" method="post" class="w3_form_post" enctype="multipart/form-data">
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
                <label>Old Password </label>
                <input type="password" name="oldpassword" placeholder="Old Password" required="">
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
                <label>Confirm Password </label>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required="">
                </span>
        </div>
        
        
    
    <div class="w3_main_grid">
        <div class="w3_main_grid_right">
            <input type="submit" value="Submit">
        </div>
    </div>
</form>
   
</div>
@endsection