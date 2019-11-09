@if (Auth::check())
@if (Auth::user()->category=="Admin" || Auth::user()->category=="Editor" || Auth::user()->category=="Contributor")
@php $layout="layouts.admin"; @endphp
@else
@php $layout="layouts.mainlayout"; @endphp
@endif
@else
@php $layout="layouts.mainlayout"; @endphp
@endif

@extends($layout)

@section('page_title')
Edit Post 
@endsection

@section('body_content')
<script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>
<div class="graphs">
    <div class="xs">
        <h4>Upload Post</h4>
          <div class="tab-content">
                   <div class="tab-pane active" id="horizontal-form"> 
                   <form method="post" class="form-horizontal" action="{{route('posts.update', $post->id)}}" enctype="multipart/form-data" >
                            @csrf
                            {{method_field('PATCH')}}
                            @if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
                            <div class="form-group">
                                <label for="exampleInputFile">Upload Cover Picture to change (Supported formats: jpg,jpeg,png,bmp,tiff)</label>
                                <input type="file" name="cover" id="uploadFile">
                                {{-- <p class="help-block">Example block-level help text here.</p> --}}
                            </div>
                            {{-- <div id="image_preview"></div> --}}
                           <div class="form-group">
                               <label for="focusedinput" class="col-sm-2 control-label">Title</label>
                               <div class="col-sm-8">
                               <input type="text" class="form-control1" value="{{$post->title}}" name="title" placeholder="Title">
                               </div>                               
                           </div>
                           <div class="form-group">
                                <label for="txtarea1" class="col-sm-2 control-label">Body</label>
                                <div class="col-sm-8"><textarea class="ckeditor" name="body">{{$post->body}}</textarea></div>
                            </div>
                            <div class="form-group">
                               <label for="selector1" class="col-sm-2 control-label">Category</label>
                               <div class="col-sm-8"><select name="category" id="selector1" class="form-control1">
                                <option value="{{$post->category->id}}" selected>{{$post->category->name}}</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>    
                                @endforeach
                               </select></div>
                           </div>
                           <div class="form-group">
                                <label for="focusedinput" class="control-label">Custom URL</label>
                               
                                    <p class=>https://egiyecholo.com/posts/ <input type="text"  name="slug" placeholder="Enter the last part" value="{{$post->slug}}" required></p>
                                                              
                            </div>
                           <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">SEO Keywords</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control1" name="seokey" placeholder="SEO Keywords" value="{{$post->seo_keywords}}">
                            </div>                               
                        </div>
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Tags</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1" name="tag" placeholder="Tags" value="{{$post->tags}}">
                            </div>                               
                        </div>
                        <div class="form-group">
                                <label for="focusedinput" class="col-sm-2 control-label">Reading Time</label>
                                <div class="col-sm-2 col-lg-2 col-md-2">
                                    <input type="text" class="form-control1" name="time" value="{{$post->reading_time}}">
                                </div>
                                <div class="col-sm-4 col-lg-4 col-md-4">
                                    <p>Minutes Read</p>
                                </div>                               
                        </div>
                        <div class="panel-footer">
                                @if (Auth::check())
                                <div class="form-group">
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control1" name="name" placeholder="Name" value="{{Auth::user()->name}}" hidden>
                                        </div>                               
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control1" name="email" placeholder="Email" value="{{Auth::user()->email}}" hidden>
                                        </div>                               
                                    </div>

                                    <div class="form-group">
                                    <input type="checkbox" name="draft" value="draft">Save As Draft
                                    </div>
                              @else
                              <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Your Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" name="name" placeholder="Name">
                                    </div>                               
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Your Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control1" name="email" placeholder="Email">
                                    </div>                               
                                </div>
                              @endif
                        
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <button class="btn-success btn">Update</button>
                                </div>
                            </div>
                         </div>
                         
                       </form>
                   </div>
               </div>
               
               
 
    </div>
</div>
<script type="text/javascript">
    CKEDITOR.replace('body', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    // $("#uploadFile").change(function(){
    //         $('#image_preview').html("");
            

    //             $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files)+"'>");

            
    //     });
</script>
@endsection