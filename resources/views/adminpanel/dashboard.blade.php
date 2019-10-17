@extends('layouts.admin')
@section('page_title')
Admin Dashboard    
@endsection
@section('body_content')
<div class="graphs">
    <div class="col_3">
       <div class="col-md-3 widget widget1">
           <div class="r3_counter_box">
               <i class="pull-left fa fa-file-text icon-rounded"></i>
               <div class="stats">
                 <h5><strong>{{$posts_count}}</strong></h5>
                 <span>Posts</span>
               </div>
           </div>
       </div>
       <div class="col-md-3 widget widget1">
           <div class="r3_counter_box">
               <i class="pull-left fa fa-users user1 icon-rounded"></i>
               <div class="stats">
                 <h5><strong>{{$total_visitors}}</strong></h5>
                 <span>Total Visitors</span>
               </div>
           </div>
       </div>
       <!--<div class="col-md-3 widget widget1">-->
       <!--    <div class="r3_counter_box">-->
       <!--        <i class="pull-left fa fa-comment user2 icon-rounded"></i>-->
       <!--        <div class="stats">-->
       <!--          <h5><strong>1012</strong></h5>-->
       <!--          <span>New Users</span>-->
       <!--        </div>-->
       <!--    </div>-->
       <!--</div>-->
       <!--<div class="col-md-3 widget">-->
       <!--    <div class="r3_counter_box">-->
       <!--        <i class="pull-left fa fa-dollar dollar1 icon-rounded"></i>-->
       <!--        <div class="stats">-->
       <!--          <h5><strong>$450</strong></h5>-->
       <!--          <span>Profit Today</span>-->
       <!--        </div>-->
       <!--    </div>-->
       <!-- </div>-->
       <div class="clearfix"> </div>
 </div>

   </div>
   
   </div>
@endsection