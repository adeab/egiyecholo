@extends('layouts.admin')
@section('page_title')
Posts List   
@endsection
@section('body_content')
<div class="span_3">

    <div class="bs-example1" data-example-id="contextual-table">
    <form method="post" action="{{route('posts.adminsearch')}}">
@csrf
<input type="text" name="searchbox"><input type="submit" value="Search">
</form>
      <table class="table table-responsive">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Category</th>
            <th>Uploader Name</th>
            <th>Uploader Email</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            <?php $index=0?>
            @forelse ($all_posts as $post)
              <tr>
                  <th scope="row">{{++$index}}</th>
                  <td>{{$post->title}}</td>
                  <td>
                      @if($post->category_id!=1)
                      {{$post->category->name}}
                      @else
                      None
                      @endif
                    </td>
                  <td>{{$post->name}}</td>
                  <td>{{$post->email}}</td>
                  <td>{{$post->publication_status}}</td>
                  <td>
                      <li class="dropdown" style="list-style:none;">
                    <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><i class="fa fa-bars" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu" style="left: -60px;">
                            <li class="m_2"><a href="{{route('admin.postview', $post->id)}}"><i class="fa fa-pencil"></i> View Full Post</a></li>
                    <li class="m_2"><a href="{{route('posts.edit', $post->id)}}"><i class="fa fa-pencil"></i> Edit</a></li>
                    <li class="m_2">
                        <form action="{{route('posts.destroy', $post->id)}}" method="post">
                        @csrf
                        {{method_field('DELETE')}}
                        <button class="" style="background:transparent;border: 0;padding: 0px 19px;color:#000;" onclick="return confirm('Are you sure you want to delete this post?')"><i class="fa fa-ban"></i> Delete</button>
                        </form>
                         
                    </li>
                    <li class="m_2"><a href="{{route('publishia', $post->id)}}"><i class="fa fa-upload"></i> Instant Article</a></li>
      
                                                                  
      
      
                    </ul>
                      </li>
                  </td>
                </tr>
            @empty
              <tr>
                  <th scope="row"><h4>No Posts Yet</h4></th>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                
              </tr>
              
            @endforelse
          
          
        </tbody>
      </table>
      {{ $all_posts->links() }}
     </div>
 </div>
 @endsection