{{-- <!DOCTYPE html> --}}
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">

  @yield('facebook_meta')

    <!-- <meta name="description" content="@yield('description')"> -->
    <meta name="keywords" content="@yield('keywords')">
    <meta name="title" content="@yield('post_title')">
    <!-- <meta name="description" content="@yield('description')"> -->
    <title>এগিয়ে চলো | বাংলাদেশের টাইমলাইন</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/style.css')}}">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css">

	<script src="https://kit.fontawesome.com/beffab7788.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri&display=swap" rel="stylesheet"> 

 <script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1100, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- responsive1 -->


</head>
<body  data-spy="scroll" data-target=".navbar" data-offset="80">

<!-- header slider area start -->
<div class="header" id="home" style="">
	  <section >
	   
<nav class="navbar">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="{{url('/')}}">
    <img class="logo_img" src="{{ asset('frontend/img/Logo Basic.png')}}" alt="logo" style="width:140px;margin-left: 10px;">

  </a>
  <div class="top_add ad_none">
  <ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9620690561069746"
     data-ad-slot="5320733035"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
  </div>
  <!-- Links -->
  <ul class=" nav_right">
    <li class="">
      <a class="" href="#"><i class="fas fa-search" data-toggle="modal" data-target="#myModal"></i></a>
    </li>
    <li class="">
      <div class="dropdown">
           <i class="far fa-user" data-toggle="dropdown"></i>
            <span class="caret"></span>
            <ul class="dropdown-menu" style="top: 33px;left: -53px;">
              @if (Auth::check())
              <li class="m_2">
                  <a href="{{url('saved_posts/')}}" ><i class="fa fa-bookmark"></i> My Saves</a>
              </li>
              <li class="m_2">
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </li>
              @else
                <li style="float:none;width: 188px;"><a href="{{url('/auth/redirect/facebook')}}"><i class="fab fa-facebook-f"></i> Login with Facebook</a></li>
                {{-- <li><button type="button" class="btn ">logout</button></li> --}}
              @endif
              
              
            </ul>
        </div>
    </li>
    <li class="">
    <a class="" href="{{route('posts.create')}}"><button type="button" class="apni_btn">আপনিও লিখুন</button></a>
    </li>
  </ul>
</nav>
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Search Here</h4>
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <form action="{{ route('searchkeyword') }}" style="border: 2px solid #ccc;">
                @csrf 
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search" name="search">
                  
                  <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </form>
        </div>
        
        
        
      </div>
    </div>
  </div>
</section>
</div>
<style>

</style>
<!-- header slider area end -->
<!-- navbar area start -->
<div id="navbar" >
 <nav class="navbar navbar-expand-md  navbar-dark"  >
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
  </button>
  <div  class="collapse navbar-collapse" id="collapsibleNavbar">
  	<div class="menu_middle">
	    <ul class="navbar-nav">
		      <li class="nav-item dropdown">
            <a class="nav-link dropbtn banla" href="{{url('বিভাগ/বাংলাদেশ')}}">বাংলাদেশ  </a>
            <div class="dropdown-content">
              <a href="{{url('বিভাগ/বাংলাদেশ/আপনি-ই সাংবাদিক')}}">আপনি-ই সাংবাদিক</a>
              <a href="{{url('বিভাগ/বাংলাদেশ/ইনসাইড বাংলাদেশ')}}">ইনসাইড বাংলাদেশ</a>
              <a href="{{url('বিভাগ/বাংলাদেশ/রাজনীতি নাকি জননীতি')}}">রাজনীতি নাকি জননীতি</a>
              <a href="{{url('বিভাগ/বাংলাদেশ/যা ঘটছে')}}">যা ঘটছে</a>
              <a href="{{url('বিভাগ/বাংলাদেশ/গনমানুষের সাক্ষাৎকার')}}">গনমানুষের সাক্ষাৎকার</a>
            </div>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropbtn khala" href="{{url('বিভাগ/খেলা ও ধুলা')}}">খেলা<span style="color: #fff;">_</span>ও<span style="color: #fff;">_</span>ধুলা</a>
             <div class="dropdown-content">
              <a href="#">ক্রিকেট</a>
              <a href="#">অ্যাসোসিয়েশনের</a>
              <a href="#">ফিনিক্স</a>
            </div>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link cinemea" href="{{url('বিভাগ/সিনেমা হলের গলি')}}">সিনেমা<span style="color: #fff;">_</span>হলের<span style="color: #fff;">_</span>গলি</a>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropbtn world" href="{{url('বিভাগ/এরাউন্ড দ্যা ওয়ার্ল্ড')}}">এরাউন্ড<span style="color: #fff;">_</span>দ্যা<span style="color: #fff;">_</span>ওয়ার্ল্ড</a>
            <div class="dropdown-content">
              <a href="{{url('বিভাগ/এরাউন্ড দ্যা ওয়ার্ল্ড/ছবি কথা বলে')}}">ছবি কথা বলে</a>
              <a href="{{url('বিভাগ/এরাউন্ড দ্যা ওয়ার্ল্ড/হেঁশেলের খোঁজ-খবরাদি')}}">হেঁশেলের খোঁজ-খবরাদি</a>
              <a href="{{url('বিভাগ/এরাউন্ড দ্যা ওয়ার্ল্ড/অদ্ভুত,বিস্ময়,অবিশ্বাস্য')}}">অদ্ভুত,বিস্ময়,অবিশ্বাস্য</a>
              <a href="{{url('বিভাগ/এরাউন্ড দ্যা ওয়ার্ল্ড/বিবিধ')}}">বিবিধ</a>
              <!-- <a href="{{url('বিভাগ/বাংলাদেশ/গনমানুষের সাক্ষাৎকার')}}">গনমানুষের সাক্ষাৎকার</a> -->
            </div>
		      </li>  
		         <li class="nav-item dropdown">
		        <a class="nav-link dropbtn tarunno" href="{{url('বিভাগ/তারুণ্য')}}">তারুণ্য</a>
            <div class="dropdown-content">
              <a href="{{url('বিভাগ/তারুণ্য/অনুপ্রেরণার গল্পগুচ্ছ')}}">অনুপ্রেরণার গল্পগুচ্ছ</a>
              <a href="{{url('বিভাগ/তারুণ্য/ডিসকভারিং বাংলাদেশ')}}">ডিসকভারিং বাংলাদেশ</a>
              <a href="{{url('বিভাগ/তারুণ্য/পিংক এন্ড ব্লু')}}">পিংক এন্ড ব্লু</a>
              <!-- <a href="{{url('বিভাগ/তারুণ্য')}}">বুক রিভিউ</a> -->
              <!-- <a href="{{url('বিভাগ/বাংলাদেশ/গনমানুষের সাক্ষাৎকার')}}">গনমানুষের সাক্ষাৎকার</a> -->
            </div>
		      </li> 
		      <li class="nav-item dropdown">
		        <a class="nav-link dropbtn reading" href="{{url('বিভাগ/রিডিং রুম')}}">রিডিং<span style="color: #fff;">_</span>রুম</a>
            <div class="dropdown-content">
              <a href="{{url('বিভাগ/রিডিং রুম/মনের অন্দরমহল')}}">মনের অন্দরমহল</a>
              <a href="{{url('বিভাগ/রিডিং রুম/রকমারি')}}">রকমারি</a>
              <a href="{{url('বিভাগ/রিডিং রুম/লেখালেখি')}}">লেখালেখি</a>
              <a href="{{url('বিভাগ/রিডিং রুম/বুক রিভিউ')}}">বুক রিভিউ</a>
              <!-- <a href="{{url('বিভাগ/বাংলাদেশ/গনমানুষের সাক্ষাৎকার')}}">গনমানুষের সাক্ষাৎকার</a> -->
            </div>
		      </li>  
		      <li class="nav-item">
		        <a class="nav-link taki" href="{{url('বিভাগ/টেকি দুনিয়ার টুকিটাকি')}}">টেকি<span style="color: #fff;">_</span>দুনিয়ার<span style="color: #fff;">_</span>টুকিটাকি</a>
		      </li> 
	    </ul>
	</div>
  </div>
</nav>
</div>
<!-- navbar area end -->
@yield('body_content')
<div class="top_add adds">
      <ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9620690561069746"
     data-ad-slot="5320733035"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
  </div>
    </div>
<!-- latest work -->
<footer>
	<div class="container footer_agaia">

		<div class="row">
      <!-- <div class="col-md-12 manu_footer">
          <ul>
            <li><a href="#">আমাদের সম্পর্কে</a></li>
            <li><a href="#">বিজ্ঞাপন  </a></li>
            <li><a href="#">যোগাযোগ করুন </a></li>
            <li><a href="#">লেখক  </a></li>
            <li><a href="#"> ইউজার পলিসি</a></li>
            <li><a href="#"> গোপনীয়তা নীতিমালা</a></li>
          </ul>
      </div>
			<div class="col-md-2 foot_right padding0">
        <h5 style="font-size: 18px;background: linear-gradient(to right, red ,yellow);
            background-clip: border-box;
          -webkit-background-clip: text;
          -webkit-text-fill-color:transparent;">বাংলাদেশ </h5>
        <p>পরিবর্তন</p>
        <p>দর দাম </p>
        <p>পণ্যের রিভিউ </p>
      </div>
      <div class="col-md-2 foot_right padding0">
        <h5 style="font-size: 18px;background: linear-gradient(to right, #98c47b ,#14d50d);
            background-clip: border-box;
          -webkit-background-clip: text;
          -webkit-text-fill-color:transparent;">খেলা ও ধুলা </h5>
        <p>পরিবর্তন</p>
        <p>দর দাম </p>
        <p>পণ্যের রিভিউ </p>
      </div>
      <div class="col-md-2 foot_right padding0">
        <h5 style="font-size: 18px;background: linear-gradient(to right, #133fec ,#00ff34);
            background-clip: border-box;
          -webkit-background-clip: text;
          -webkit-text-fill-color:transparent;">তারুণ্য</h5>
        <p>পরিবর্তন</p>
        <p>দর দাম </p>
        <p>পণ্যের রিভিউ </p>
      </div>
			<div class="col-md-2 foot_right padding0">
				<h5 style="font-size: 18px;background: linear-gradient(to right, #e42121 ,#d40cf0);
            background-clip: border-box;
          -webkit-background-clip: text;
          -webkit-text-fill-color:transparent;">এরাউন্ড দ্যা ওয়ার্ল্ড</h5>
        <p>পরিবর্তন</p>
        <p>দর দাম </p>
        <p>পণ্যের রিভিউ </p>
			</div>
      <div class="col-md-2 foot_right padding0">
        <h5 style="font-size: 18px;background: linear-gradient(to right, #133fec ,#00ff34);
            background-clip: border-box;
          -webkit-background-clip: text;
          -webkit-text-fill-color:transparent;"> সিনেমা হলের গলি</h5>
        <p>পরিবর্তন</p>
        <p>দর দাম </p>
        <p>পণ্যের রিভিউ </p>
      </div>
			<div class="col-md-2 foot_right padding0">
				<h5 style="font-size: 18px;background: linear-gradient(to right, #98c47b ,#14d50d);
            background-clip: border-box;
          -webkit-background-clip: text;
          -webkit-text-fill-color:transparent;">টেকি দুনিয়া</h5>
				<p>পরিবর্তন</p>
				<p>দর দাম </p>
				<p>পণ্যের রিভিউ </p>
			</div>-->
      <div class="col-md-12" style="padding: 15px;border-top: 2px solid #ccc;">
        <div class="row">
          <div class="col-md-5 f_right">
            <p>© ২০১৯-২০ এগিয়ে চলো ।  সর্বস্বত্ব সংরক্ষিত।</p>
            <ul>
              <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
              <li><a href="#"><i class="fas fa-rss"></i></a></li>
            </ul>
          </div> 
          <div class="col-md-7 f_left">
              <div class="foot_text1">
            <p>সম্পাদক ও প্রকাশক:<span style="font-weight: 501;"> মুক্তার ইবনে রাফিক</span>  <br>
            ডিজাইন এবং ডেভেলপমেন্টঃ  <a href="http://samiul.ml/sabbir/">  সাব্বির</a>  এবং  রাফায়েতুল </p>
            </div>
          </div>
        </div>
      </div>
		</div>
	</div>
</footer>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
<script  src="https://code.jquery.com/jquery-3.2.1.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

 <script src="{{ asset('frontend/js/multislider.js')}}"></script><!--  top slider -->
<script type="text/javascript">
  $(document).ready(function(){

    loadGallery(true, 'a.thumbnail');

    // the modal This function disables buttons when needed
    function disableButtons(counter_max, counter_current){
        $('#show-previous-image, #show-next-image').show();
        if(counter_max == counter_current){
            $('#show-next-image').hide();
        } else if (counter_current == 1){
            $('#show-previous-image').hide();
        }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr){
        var current_image,
            selector,
            counter = 0;

        $('#show-next-image, #show-previous-image').click(function(){
            if($(this).attr('id') == 'show-previous-image'){
                current_image--;
            } else {
                current_image++;
            }

            selector = $('[data-image-id="' + current_image + '"]');
            updateGallery(selector);
        });

        function updateGallery(selector) {
            var $sel = selector;
            current_image = $sel.data('image-id');
            $('#image-gallery-caption').text($sel.data('caption'));
            $('#image-gallery-title').text($sel.data('title'));
            $('#image-gallery-image').attr('src', $sel.data('image'));
            disableButtons(counter, $sel.data('image-id'));
        }

        if(setIDs == true){
            $('[data-image-id]').each(function(){
                counter++;
                $(this).attr('data-image-id',counter);
            });
        }
        $(setClickAttr).on('click',function(){
            updateGallery($(this));
        });
    }
});
</script>
<script>
$('#basicSlider').multislider({
			continuous: true,
			duration: 2000
		});//bottom slider news
		$('#mixedSlider').multislider({
			duration: 750,
			interval: 3000
		});
</script>
<script>
//top navbar 
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
   wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();
    document.getElementById('moar').onclick = function() {
      var section = document.createElement('section');
      section.className = 'section--purple wow fadeInDown';
      this.parentNode.insertBefore(section, this);
    };
</script>


</body>
</html>