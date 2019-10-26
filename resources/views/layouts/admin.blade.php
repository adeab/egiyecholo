
<!DOCTYPE HTML>
<html>
<head>
<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="{{ asset('backend/css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="{{ asset('backend/css/style.css') }}" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="{{ asset('backend/css/lines.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ asset('backend/css/font-awesome.css') }}" rel="stylesheet"> 
<!-- jQuery -->
<script src="{{ asset('backend/js/jquery.min.js') }}"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Nav CSS -->
<link href="{{ asset('backend/css/custom.css') }}" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset('backend/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('backend/js/custom.js') }}"></script>
<!-- Graph JavaScript -->
<script src="{{ asset('backend/js/d3.v3.js') }}"></script>
<script src="{{ asset('backend/js/rickshaw.js') }}"></script>
</head>
<body>
<div id="wrapper">
     
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/backend/dashboard')}}"><img style="margin: -9px;height: 38px;" src="{{asset('frontend/img/Logo Basic.png')}}"></a>
            </div>
          
            {{-- <ul class="nav navbar-nav navbar-right">
				
			    <li class="dropdown">
                
	        		<a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="{{ asset('storage/userImage/'. Auth::user()->profile_picture) }}"></a>
	        		<ul class="dropdown-menu">
						
						<li class="m_2"><a href="{{ route('admin.change_password') }}"><i class="fa fa-shield"></i> Change Password</a></li>
						<li class="m_2">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>

                                                            


	        		</ul>
	      		</li>
			</ul> --}}
			
            
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
                        </li>
                        @if(Auth::user()->category=="Admin")
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw nav_icon"></i>Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('admin.useradd') }}">Add User</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.userlist') }}">Users List</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @endif
                        <li>
                            <a href="#"><i class="fa fa-file-text fa-fw nav_icon"></i>Posts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('posts.create')}}">Upload A Post</a>
                                </li>
                                @if(Auth::user()->category!="Contributor")
                                <li>
                                    <a href="{{route('admin.allposts')}}">All Posts</a>
                                </li>

                                <li>
                                    <a href="{{route('admin.pendingposts')}}">Pending Posts</a>
                                </li>
                                @endif
                                <li>
                                    <a href="{{route('admin.myposts')}}">My Posts</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{route('admin.iaposts')}}"><i style="font-size: 16px;" class="fa fa-facebook fa-fw nav_icon"></i>Instant Article</a>
                        </li>
                        <hr>
                        <li><a href="{{ route('admin.change_password') }}"><i class="fa fa-shield fa-fw nav_icon"></i> Change Password</a></li>
						<li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw nav_icon"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
			@yield('body_content')
       </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
</body>
</html>
