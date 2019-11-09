<div class="col-md-3 third_lay_img">
    
    <!--@if($post->olddb==0)-->
    <!--        <img class=" img-responsive" style="margin:0 auto;"  src="{{ asset('storage/blogImage/' . $post->cover_image) }}" >-->
    <!--        @else-->
    <!--        <img class=" img-responsive" style="margin:0 auto;"  src="{{$post->cover_image}}" >-->
    <!--        @endif-->
    <!--<p class="sec_date">{{$post->name}}</p>-->
    <!--<a href="{{url('posts/'.$post->slug)}}"-->
    <!--<h6>{{$post->title}}</h6>-->
    <!--{{$allposts[1]->category->name}}-->
    
    @foreach($allposts as $single)
            <!--{{$single['name']}}-->

        {{$single->category['name']}}
    @endforeach
 </div>