@extends('layouts.mainlayout')
@section('body_content')
<!-- group slider news start -->
<div class="container-fluid" id="News">
    <div id="mixedSlider">
                        <div class="MS-content">
                            @foreach($topposts as $post)
                            <div class="item">
                                <div class="imgTitle">
                                    
                                    @if($post->olddb==0)
                                    <img class=" img-responsive" style="margin:0 auto;"  src="{{ asset('storage/blogImage/' . $post->cover_image) }}" >
                                    @else
                                        @if(!empty($post->cover_image))
                                    <img class=" img-responsive" style="margin:0 auto;"  src="{{$post->cover_image}}" >
                                        @else
                                        <img class=" img-responsive" style="margin:0 auto;"  src="https://neilpatel.com/wp-content/uploads/2018/10/blog.jpg" >
                                        @endif
                                    @endif
                                   <img class="img2" src="{{ asset('storage/userImage/'. $post->user->profile_picture) }}">
                                    
                                </div>
                                <div class="text_slide">
                                    <a href="{{url('posts/'.$post->id)}}">
                                  <h6>{{$post->name}}</h6>
                                 <p>{{$post->title}}</p>
                                 </a>
                                </div>
                            </div>
                            @endforeach
                            
                           
                        </div>
                        <div class="MS-controls">
                            <button class="MS-left"><i class="fas fa-arrow-left"></i></button>
                            <button class="MS-right"><i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
    </div>
    <!-- group slider news end -->
    
    <!-- add area -->
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
    <!-- add area -->
    <!-- first tab area start-->
    <!--<section class="first_layout"style="margin-bottom: 50px;">-->
    <!--  <div class="container">-->
    <!--    <div class="layout_area">-->
    <!--      <div class="row margin0">-->
    <!--        <div class="col-md-12 first_tab">-->
    <!--          <ul>-->
    <!--            <li><a href="">জনপ্রিয় </a></li>-->
    <!--            <li><a href="">আলোচিত </a></li>-->
    <!--            <li><a href="">সর্বাধিক মন্তব্য</a></li>-->
    <!--          </ul>-->
    <!--        </div>-->
    
    <!--        <div class=" row col-md-12 sec_lay">-->
    <!--          <div class="col-md-6">-->
    <!--            <div class="row ">-->
    <!--              <div class="col-md-6 sec_lay_img">-->
    <!--                <img src="{{ asset('frontend/img/1.png')}}">-->
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
    <!--              <img src="{{ asset('frontend/img/musafir.png')}}">-->
    <!--              <p class="sec_date">ইতি মল্লিক</p>-->
    <!--              <h6>আপনাদের ট্রল-নোংরামি এবার কোপাকুপিতে গড়ালো!</h6>-->
    <!--          </div>-->
    <!--          <div class="col-md-3 sec_left padding0">-->
    <!--            <ul>-->
    <!--              <li>-->
    <!--                <a href="">মুক্তিযুদ্ধে নির্যাতিতা নারীর সংখ্যা আসলে কত?</a>-->
    <!--              </li>-->
    <!--              <li>-->
    <!--                <a href="">মুক্তিযুদ্ধে নির্যাতিতা নারীর সংখ্যা আসলে কত?</a>-->
    <!--              </li>-->
    <!--              <li>-->
    <!--                <a href="">মুক্তিযুদ্ধে নির্যাতিতা নারীর সংখ্যা আসলে কত?</a>-->
    <!--              </li>-->
    <!--              <li>-->
    <!--                <a href="">মুক্তিযুদ্ধে নির্যাতিতা নারীর সংখ্যা আসলে কত?</a>-->
    <!--              </li>-->
                 
    <!--              <li style="padding: 12px;border: none;">-->
    <!--                <a href="" style="color:red">সব জনপ্রিয় খবর এক সাথে দেখুন -></a>-->
    <!--              </li>-->
    <!--            </ul>-->
    <!--          </div>-->
    <!--        </div>-->
    
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--  </div>-->
    <!--</section>-->
    <!-- first tab area end-->
    
    <!-- second tab area start-->
   
    @foreach ($categories as $category)
    <section class="third_layout" style="margin-bottom: 50px;">
      <div class="container">
            <div class="lay_3 col-md-12">
              <div class="row ">
                 <div class="col-md-3 padding0">
                   <div class="menu_tab_1" style="background-color:{{$category->color_code}};">
                      {{$category->name}}
                     {{-- <div class="tab_side_logo">
                       <img src="{{ asset('frontend/img/smallmap.png')}}">
                     </div> --}}
                   </div>
                   <div class="right_tab_menu">
                     <ul>
                         @foreach($subcategories as $sc)
                            @if($sc->parent_category==$category->id)

                             <li class="sub_menu_li">
                              <style type="text/css">
                                .sub_menu_li:hover{
                                  padding-left: 5px;
                                  border-left: 5px solid {{$category->color_code}};
                                  
                                }
                            </style>
                                  <!-- ------------------------------------------------------------------------- -->
                                  <!-- ei link e on hover bam paser yellow bar er jaygay {{$category->color_code}} ei color er bar asbe -->
                                  <!-- ------------------------ -->
                                 <a href="{{url('বিভাগ/'.$category->name.'/'.$sc->name)}}">{{$sc->name}}</a>
                             </li>
                             @endif
                         @endforeach
                       <!-- {{--  <li style="padding: 12px;border: none;"> -->
                       <!-- <li><a href="#">যা ঘটছে</a></li>-->
                       <!--<li><a href="#">রাজনীতি নাকি জননীতি</a></li>-->
                       <!--<li><a href="#">রক্তাক্ত একাত্তর</a></li>-->
                       <!--<li><a href="#">আপনি-ই সাংবাদিক</a></li>--}}-->
                       <li style="padding: 12px;border: none;"> 
                    
                            <a href="{{url('বিভাগ/'.$category->name)}}" style="color:red">সব  একসাথে দেখুন <i class="fas fa-long-arrow-alt-right"></i></a>
                        </li>
                     </ul>
                   </div>
                 </div>
                 
                @php $i=0 @endphp 
                @foreach($all_posts as $post)
                     @if($post->category_id==$category->id or $post->category['parent_category']==$category->id)
                         @php $i++ @endphp
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
                             <!-- ------------------------------------------------------------------------- -->
                                  <!-- ei link on hover {{$category->color_code}} ei color hobe -->
                                  <!-- ------------------------ -->
                            <a href="{{url('posts/'.$post->id)}}">
                            <h6>{{$post->title}}</h6></a>
                         </div>
                         @if($i==3)
                            @break
                         @endif
                     @endif
                @endforeach
                 
                 
            </div>
          </div>
        </div>
    </section>
    @endforeach
    <!-- third tab area start-->
    <!-- second tab area start-->
    
    <!-- add area -->
    <div class="container">
        <div class="row">
          <div class="top_add adds">
          <img src="{{ asset('frontend/img/728x90.jpg')}}">
        </div>
      </div>
    </div>
    <!-- add area -->
    <!-- third tab area start-->
    <!--<section class="gallery_last" style="margin-bottom: 50px;">-->
    <!--  <div class="container">-->
    <!--    <div class="col-md-12 gal_top">-->
    <!--      <div class="row" style="border-bottom: 1px solid #ccc;">-->
    <!--        <div class="col-md-6" style="padding-top: 15px;">-->
    <!--          <p class="cobir">ছবির হাট</p>-->
    <!--        </div>-->
    <!--        <div class="col-md-6" style="height: 38px;">-->
    <!--           <ul class="pagination pagination-sm">-->
                  
    <!--              <li class="page-item"><a class="page-link" href="#">১ </a></li>-->
    <!--              <li class="page-item"><a class="page-link" href="#">২ </a></li>-->
    <!--              <li class="page-item"><a class="page-link" href="#">৩ </a></li>-->
    <!--              <li class="page-item"><a class="page-link" href="#"> ৪  </a></li>-->
    <!--              <li class="page-item"><a class="page-link" href="#">৫  </a></li>-->
    <!--              <li class="page-item"><a class="page-link" href="#">৬ </a></li>-->
                  
    <!--            </ul>-->
    <!--        </div>-->
    <!--      </div>-->
    <!-- gallery area -->
    <!--                <div class="col-md-12 low_gal">-->
    <!--                  <div class="row">-->
    <!--                      <div class="col-lg-3 col-md-4 col-xs-6 thumb">-->
    <!--                      <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"  data-image="img/1.png" data-target="#image-gallery">-->
    <!--                          <img class="img-responsive" src="{{ asset('frontend/img/1.png')}}" alt="">-->
    <!--                      </a>-->
    <!--                  </div>-->
    <!--                  <div class="col-lg-3 col-md-4 col-xs-6 thumb">-->
    <!--                      <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"  data-image="img/gal.png" data-target="#image-gallery">-->
    <!--                          <img class="img-responsive" src="{{ asset('frontend/img/gal.png')}}" alt="A alt text">-->
    <!--                      </a>-->
    <!--                  </div>-->
    <!--                  <div class="col-lg-3 col-md-4 col-xs-6 thumb">-->
    <!--                      <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"data-image="img/1.png" data-target="#image-gallery">-->
    <!--                          <img class="img-responsive" src="{{ asset('frontend/img/1.png')}}" alt="">-->
    <!--                      </a>-->
    <!--                  </div>-->
    <!--                  <div class="col-lg-3 col-md-4 col-xs-6 thumb">-->
    <!--                      <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"data-image="img/gal.png" data-target="#image-gallery">-->
    <!--                          <img class="img-responsive" src="{{ asset('frontend/img/gal.png')}}" alt="">-->
    <!--                      </a>-->
    <!--                  </div>-->
    
    <!--          <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
    <!--              <div class="modal-dialog">-->
    <!--                  <div class="modal-content">-->
    <!--                      <div class="modal-header">-->
    <!--                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>-->
    <!--                          <h4 class="modal-title" id="image-gallery-title"></h4>-->
    <!--                      </div>-->
    <!--                      <div class="modal-body">-->
    <!--                          <img id="image-gallery-image" class="img-responsive" src="">-->
    <!--                      </div>-->
                          
    <!--                  </div>-->
    <!--              </div>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!-- gallery area -->
    
    <!--    </div>-->
    <!--  </div>-->
    <!--</section>-->
    <!-- latest work -->
    @endsection