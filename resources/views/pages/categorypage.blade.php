@extends('layouts.mainlayout')

@section('body_content')
<div class="sub_menu_lay" style="background-color:{{$category->color_code}};">
  <div class="container">
    <div class="col-md-12 row">
      <div class="col-md-6" >
        <h1 style="float: left;padding: 3px 15px;font-weight: 700;">{{$category->name}}</h1>
        <br>
        <p>{{$category->description}}</p>
      </div>
      {{-- <div class="col-md-6 sub_maps">
        <img src="img/smallmap.png">
      </div> --}}
    </div>
  </div>
</div>
<!-- add area -->
<div class="container">
    <div class="row">
      <div class="top_add adds">
      <img src="img/add.png">
    </div>
  </div>
</div>
<!-- add area -->
<!-- first tab area start-->
<!--<section class="first_layout"style="margin-bottom: 50px;">-->
<!--  <div class="container">-->
<!--    <div class="layout_area">-->
<!--      <div class="row margin0">-->
<!--        <div class="col-md-12 first_tab" style="background: #E7E8EC;padding: 7px 6px;">-->
<!--          এই সপ্তাহের জনপ্রিয়-->
<!--        </div>-->

<!--        <div class=" row col-md-12 sec_lay">-->
<!--          <div class="col-md-6">-->
<!--            <div class="row ">-->
<!--              <div class="col-md-6 sec_lay_img">-->
<!--                <img src="img/1.png">-->
<!--              </div>-->
<!--              <div class="col-md-6 sec_lay_text">-->
<!--                <p class="sec_date">ইতি মল্লিক</p>-->
<!--                <h5>আপনাদের ট্রল-নোংরামি এবার কোপাকুপিতে গড়ালো!</h5>-->
<!--                <h6 class="sec_date">জুন ২২, ২০১৮   |    ০৯ মন্তব্য </h6>-->
<!--                <p class="sec_gen_text">গত কয়েকদিন আগে ফুটবল বিশ্বকাপে বিভিন্ন দলকে সমর্থন করার নামে আমাদের চিরাচরিত গালাগালি আর নোংরামির প্রতিবাদে একটা লেখা লিখেছিলাম। তারপরেই যেন ঝড় বয়ে গেল সবর্ত্র। দলে দলে ব্রাজিল </p>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--          <div class="col-md-3 two_sec_img">-->
<!--              <img src="img/musafir.png">-->
<!--              <p class="sec_date">ইতি মল্লিক</p>-->
<!--              <h6>আপনাদের ট্রল-নোংরামি এবার কোপাকুপিতে গড়ালো!</h6>-->
<!--          </div>-->
<!--          <div class="col-md-3 two_sec_img">-->
<!--              <img src="img/musafir.png">-->
<!--              <p class="sec_date">ইতি মল্লিক</p>-->
<!--              <h6>আপনাদের ট্রল-নোংরামি এবার কোপাকুপিতে গড়ালো!</h6>-->
<!--          </div>-->
          
<!--        </div>-->

<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--  </div>-->
<!--</section>-->
<!-- first tab area end-->
<!-- second tab area start-->
<section class="third_layout" style="margin-bottom: 50px;">
  <div class="container">
        <div class="lay_3 col-md-12">
          <div class="row ">
              @foreach($posts as $post)
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
                <p class="sec_date">{{$post->name}}</p>
                <a href="{{url('posts/'.$post->id)}}"><h6>{{$post->title}}</h6></a>
             </div>   
              @endforeach
              {{$posts->links()}}
             
             
        </div>
      </div>
    
    </div>
</section>
<!-- third tab area start-->

<!-- pagenation area start-->
<!--<div class="container">-->
<!--  <div class="col-md-12 pagi">-->
<!--    <div class="row">-->
<!--         <ul class="pagination">-->
<!--            <li class="page-item"><a class="page-link" href="#">প্রিভিয়াস পেজ </a></li>-->
<!--            <li class="page-item"><a class="page-link" href="#">১</a></li>-->
<!--            <li class="page-item"><a class="page-link" href="#">২</a></li>-->
<!--            <li class="page-item"><a class="page-link" href="#">৩</a></li>-->
<!--            <li class="page-item"><a class="page-link" href="#">৪</a></li>-->
<!--            <li class="page-item"><a class="page-link" href="#">৫</a></li>-->
<!--            <li class="page-item"><a class="page-link" href="#">৬</a></li>-->
<!--            <li class="page-item"><a class="page-link" href="#">নেক্সট পেজ</a></li>-->
<!--          </ul> -->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
@endsection