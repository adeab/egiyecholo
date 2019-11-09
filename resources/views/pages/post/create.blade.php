<script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>
@if (Auth::check())
    @if (Auth::user()->category=="Admin" || Auth::user()->category=="Editor" || Auth::user()->category=="Contributor")
        @php 
            $layout="layouts.admin";
            $bodycontent="pages.post.admincreate"; 
        @endphp
    @else
        @php 
            $layout="layouts.mainlayout"; 
            $bodycontent="pages.post.usercreate";
        @endphp
    @endif
@else
    @php 
        $layout="layouts.mainlayout"; 
        $bodycontent="pages.post.usercreate";
    @endphp
@endif

@extends($layout)

@section('page_title')
Upload   
@endsection

@section('body_content')
@include($bodycontent)
@endsection
