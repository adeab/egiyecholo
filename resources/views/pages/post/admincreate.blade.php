

<div class=" container graphs">
    <div class="xs" style="background:#ccc;padding: 30px;">
        <h4>Upload Post</h4>
          <div class="tab-content">
                   <div class="tab-pane active" id="horizontal-form"> 
                   <form method="post" class="form-horizontal" action="{{route('posts.store')}}" enctype="multipart/form-data" >
                            @csrf
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
                                <label for="exampleInputFile">Upload Cover Picture (Supported formats: jpg,jpeg,png,bmp,tiff)</label>
                                <input type="file" name="cover" id="uploadFile">
                                {{-- <p class="help-block">Example block-level help text here.</p> --}}
                            </div>
                            {{-- <div id="image_preview"></div> --}}

                            <div class="form-group">
                               <label for="focusedinput" class=" control-label">Caption</label>
                               
                                   <input type="text" class="form-control1" name="caption" placeholder="Caption">
                                                             
                           </div>
                           <hr>
                           <div class="form-group">
                               <label for="focusedinput" class=" control-label">Title</label>
                               
                                   <input type="text" class="form-control1" name="title" placeholder="Title">
                                                             
                           </div>
                           <div class="form-group">
                                <label for="txtarea1" class="control-label">Body</label>
                                <textarea class="ckeditor" name="body"></textarea>
                            </div>
                            <div class="form-group">
                               <label for="selector1" class="control-label">Category</label>
                               <select name="category" id="selector1" class="form-control1">
                                <option disabled selected>Select</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>    
                                @endforeach
                               </select>
                           </div>
                           <div class="form-group">
                                <label for="focusedinput" class="control-label">Custom URL</label>
                               
                                    <p class=>https://egiyecholo.com/posts/ <input type="text"  name="slug" placeholder="Enter the last part" required></p>
                                                              
                            </div>
                           <div class="form-group">
                                <label for="focusedinput" class="control-label">SEO Keywords</label>
                               
                                    <input type="text" class="form-control1" name="seokey" placeholder="SEO Keywords">
                                                              
                            </div>
                            <div class="form-group">
                                <label for="focusedinput" class="control-label">Tags</label>
                                
                                    <input type="text" class="form-control1" name="tag" placeholder="Tags">
                                                             
                            </div>
                            <div class="form-group">
                                    <label for="focusedinput" class="control-label">Reading Time</label>
                                    
                                        <input type="text" class="form-control1" name="time" >
                                    
                                    
                                        <p>Minutes Read</p>
                                                                 
                            </div>
                        <div class="">
                                @if (Auth::check())
                                <div class="form-group">
                                      
                                        <input type="text" class="form-control1" name="name" placeholder="Name" value="{{Auth::user()->name}}" hidden>
                                                                    
                                    </div>
                                    <div class="form-group">
                                        
                                            <input type="email" class="form-control1" name="email" placeholder="Email" value="{{Auth::user()->email}}" hidden>
                                                                     
                                    </div>
                                    @if (Auth::user()->category=="Admin")
                                    <div class="form-group">
                                        <label for="selector2" class="control-label">Assign Author</label>
                                        <select name="assigned_author" id="selector2" class="form-control1">
                                            <option selected value="None">None</option>

                                            @foreach ($allusers as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>    
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    @endif
                                    <div class="form-group">
                                    <input type="checkbox" name="draft" value="draft">Save As Draft
                                    </div>
                              @else
                              <div class="form-group">
                                    <label for="focusedinput" class=" control-label">Your Name</label>
                                    
                                        <input type="text" class="form-control1" name="name" placeholder="Name">
                                                                 
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput" class="control-label">Your Email</label>
                                    
                                        <input type="email" class="form-control1" name="email" placeholder="Email">
                                                                
                                </div>
                              @endif
                        
                           <div class="row">
                                
                                    <button class="btn-success btn">Submit</button>
                               
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
    
</script>