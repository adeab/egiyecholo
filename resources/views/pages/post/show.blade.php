

@extends('layouts.mainlayout')
    @section('page_title')
    Post Page
    @endsection
    @section('keywords')
@foreach($seo_keywords as $seo_keyword)
{{$seo_keyword}}
@endforeach
@endsection
    @section('body_content')
<style> 

</style>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0"></script>

<div class="details_lay">
  <div class="back_t"></div>
  <div class="container">
      <div class=" row" style="margin: 0px;">
    <div class="col-md-8 "style="padding:0;">
      <div class="row">
            <div class="ti_p ">
                <p>{{$post->category->name}}</p>
          </div>
           <div class="title_tag col-md-12">
             <h1>{{$post->title}}</h1>
        </div>
        <div class="title_list col-md-12">
            <ul>
              <li style="list-style: none;"><img src="{{ asset('storage/userImage/'. $post->user->profile_picture) }}"><a href=""> {{$post->name}}</a></li>
              <li><a href="">{{ \Carbon\Carbon::parse($post->published_at)->diffForHumans() }}</a></li>
              <!--<li><a href="">{{$post->viewcount}}</a></li>-->
              <!--<li><a href="">9 client</a></li>-->
            </ul>
            @if (Auth::check())
              @if($post_saved=="true")
                <div class="de_right"><a href="{{url('removebookmark/'.$post->id)}}"><i class="far fa-times"></i> Remove From Bookmark</a></div>
              @else
                <div class="de_right"><a href="{{url('addbookmark/'.$post->id)}}"><i class="far fa-bookmark"></i> save</a></div>
              @endif
            @endif
        </div>

      </div>
      <div class="col-md-12 final" style="padding:0;">
                                    @if($post->olddb==0)
                                    <img class=" img-responsive" style="margin:0 auto;"  src="{{ asset('storage/blogImage/' . $post->cover_image) }}" >
                                    @else
                                        @if(!empty($post->cover_image))
                                    <img class=" img-responsive" style="margin:0 auto;"  src="{{$post->cover_image}}" >
                                        @else
                                        <img class=" img-responsive" style="margin:0 auto;"  src="https://neilpatel.com/wp-content/uploads/2018/10/blog.jpg" >
                                        @endif
                                    @endif
        <p>{!!$body!!}</p>
         <div class="container">
        <div class="row">
          <div class="top_add adds">
          <ins class="adsbygoogle"
            style="display:block"
            data-ad-client="ca-pub-9620690561069746"
            data-ad-slot="5320733035"
            data-ad-format="auto"
            data-full-width-responsive="true"></ins>
        </div>
      </div>
    </div>
        <div class="tag_e">
            <ul>
                <li class="tag_1"> <i class="fas fa-tags"></i> ট্যাগ</li>
                @foreach ($tags as $tag)
                <a href="{{url('searchtag/'.$tag->tag->tagname)}}"><li>{{$tag->tag->tagname}}</li></a>
                @endforeach
            </ul>    
        </div>
      </div>
      <div class="fb-comments" data-href="{{Request::url()}}" data-width="100%" data-numposts="6"></div>
      
    </div>
    <div class="col-md-4 det_add">
        <div class="mid_add_img">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- small ads -->
        <ins class="adsbygoogle"
            style="display:inline-block;width:100%;height:100%"
            data-ad-client="ca-pub-9620690561069746"
            data-ad-slot="9203519566"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        </div>
       <!--  <div class="long_add_img ">
            <img src=" " class=" img-responsive" style="margin:0 auto;">
        </div> -->
        
    </div>
  </div>
</div>

<!-- next previous start -->
<div class="container" style="background:#fff;
margin-bottom: 50px;">
  <div class="col-md-12">
    <div class="row">
        @if(!empty($previous))
      <div class="col-md-6 pre">
        <p><a href="{{url('posts/'.$previous->id)}}"><i class="fas fa-long-arrow-alt-left"></i> Previous</a></p>
        
        
        @if($previous->olddb==0)
                                    <img style="float: left;" src="{{ asset('storage/blogImage/' . $previous->cover_image) }}" >
                                    @else
                                        @if(!empty($previous->cover_image))
                                    <img style="float: left;"  src="{{$previous->cover_image}}" >
                                        @else
                                        <img style="float: left;"  src="https://neilpatel.com/wp-content/uploads/2018/10/blog.jpg" >
                                        @endif
                                    @endif
        
        <p class="sec_date">{{$previous->name}}</p>
        <h6>{{$previous->title}}</h6>
      </div>
      @endif
      @if(!empty($next))
      <div class="col-md-6 ne">
        <div class="pull_ne">
          <p ><a href="{{url('posts/'.$next->id)}}">Next <i class="fas fa-long-arrow-alt-right"></i></a></p> 
        </div>
           @if($next->olddb==0)
                                    <img src="{{ asset('storage/blogImage/' . $next->cover_image) }}" >
                                    @else
                                        @if(!empty($next->cover_image))
                                    <img src="{{$next->cover_image}}" >
                                        @else
                                        <img src="https://neilpatel.com/wp-content/uploads/2018/10/blog.jpg" >
                                        @endif
                                    @endif
            <p class="sec_date">{{$next->name}}</p>
        <h6>{{$next->title}}</h6>
       
      </div>
      @endif
    </div>
  </div>
</div>
</div>
<!-- next previous end -->

@endsection