
@extends('layouts.mainlayout')
    @section('page_title')
    Results
    @endsection

    @section('body_content')
   
    <section class="third_layout" style="margin-bottom: 50px;">
  <div class="container">
        <div class="lay_3 col-md-12">
        @if($type=="keyword")
        <div class="alert alert-info">
            Search results for <strong>{{$keyword}}</strong>
        </div>
        @elseif($type=="tag")
            <div class="alert alert-info">
            Posts with tag <strong>{{$keyword}}</strong>
                </div>
            <!-- <h4> {{$keyword}}</h4> -->
        @elseif($type=="writer")
        <div class="alert alert-info">
        Posts by <strong>{{$keyword}}</strong>
            </div>
        @else
        <div class="alert alert-info">
          <strong>{{$keyword}}</strong>
                </div>
            <!-- <h4> {{$keyword}}</h4> -->
        @endif
          <div class="row ">
              @forelse($posts as $post)
                <div class="col-md-3 third_lay_img">
                 @if($post->olddb==0)
                                    <img class=" img-responsive" style="margin:0 auto;"  src="{{ asset('storage/blogImage/' . $post->cover_image) }}" >
                                    @else
                                        @if(!empty($post->cover_image))
                                    <img class=" img-responsive" style="margin:0 auto;"  src="{{$post->cover_image}}" >
                                        @else
                                        <img class=" img-responsive" style="margin:0 auto;"  src="https://neilpatel.com/wp-content/uploads/2018/10/blog.jpg" >
                                        @endif
                                    @endif
                <a href="{{url('searchauthor/'.$post->name)}}"><p class="sec_date">{{$post->name}}</p></a>
                <a href="{{url('posts/'.$post->slug)}}"><h6>{{$post->title}}</h6></a>
             </div>
             @empty
             <h3>No Posts Found</h3>   
              @endforelse
              @if($type!="bookmark")
              {{$posts->links()}}
              @endif
             
             
        </div>
      </div>
    
    </div>
</section> 
@endsection