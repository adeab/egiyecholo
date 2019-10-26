<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Category;
use App\SeoKeyword;
use App\SeoPost;
use App\Tag;
use App\TagPost;
use App\Bookmark;
// use Visitor;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $log=Visitor::count();   //fetch ip record;
        // dd($log);
        $categories=Category::where('parent_category', 0)->get();
        return view('pages.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, ['title'=>'required', 
        'body'=>'required',
        'cover'=>'image|required|mimes:jpg,jpeg,png,bmp,tiff |max:4096'
        ]);
        $image = $request->file('cover');
        $slug = str_slug($request->title);
        $currentDate = Carbon::now()->toDateString();
        $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
        if (!file_exists('storage/blogImage')) {
            mkdir('storage.blogImage', 0777, true);
        }
        $image->move('storage/blogImage', $imagename);
        
        $post=new Post; //create new blog instance
        $post->title=$request->title;
        $post->body=$request->body;
        $post->cover_image=$imagename;
        $post->email=$request->email;
        $post->name=$request->name;
        $post->reading_time=$request->time;
        $post->category_id=$request->category;
        $post->seo_keywords=$request->seokey;
        $post->tags=$request->tag;
        
        $post->viewcount=0;

        
        

        
        if (Auth::check()) {
            if(Auth::user()->category!="Subscriber"){
                $post->user_id=auth()->user()->id;
                $post->publication_status="Published";
                
            }
            else{
                $post->publication_status="Pending";
            }
        }
        else
        {
        $post->publication_status="Pending";
        }
        $post->save();

        $seo=explode(',', $request->seokey);
        
        foreach($seo as $keyword)
        {
            //add to seo keyword table
            $seo=SeoKeyword::where('keyword', $keyword)->first();
            if (empty($seo))
            {
                $seo=new SeoKeyword;
                $seo->keyword=$keyword;
                $seo->save();
                
            }
            //update seo post table
            $seo_post=new SeoPost();
            $seo_post->seo_id=$seo->id;
            $seo_post->post_id=$post->id;
            $seo_post->save();
        }
        
        $tags=explode(',', $request->tag);
        foreach($tags as $tagname)
        {
            //add to tag table
            $tag=Tag::where('tagname',$tagname)->first();
            if (empty($tag))
            {
                $tag=new Tag;
                $tag->tagname=$tagname;
                $tag->save();
                
            }
            //update tag post table
            $tag_post=new TagPost;
            $tag_post->tag_id=$tag->id;
            $tag_post->post_id=$post->id;
            $tag_post->save();
        }
        if($post->publication_status=="Published")
        {
            
            $post->published_at=$post->created_at;
            $post->save();
        }
        // dd(auth()->user()->category);
        if (Auth::check()) {
            if (auth()->user()->category=="Admin" || auth()->user()->category=="Editor" )
            {
                return redirect('backend/posts');

            }
            elseif(auth()->user()->category=="Contributor")
            {
                return redirect('backend/myposts');

            }
            else
            {
                return redirect('/');    
            }    
        
        }
        else
        {
            return redirect('/');
        }
        


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $post=Post::find($id);
        $bookmark= Bookmark::where('user_id', auth()->user()->id)->where('post_id', $id)->first();
        if(empty($bookmark)){
        $post_saved="false";}
        else
        {
            $post_saved="true";
        }
        

          // get previous user id
        $previous = Post::where('id', '<', $post->id)->where('category_id', $post->category_id)->where('publication_status', 'Published')->orderBy('id','desc')->first();
        // get next user id
       $next = Post::where('id', '>', $post->id)->where('category_id', $post->category_id)->where('publication_status', 'Published')->orderBy('id')->first();
       $tags= TagPost::where('post_id', $id)->get();
       $seos= SeoPost::where('post_id', $id)->get();
       $paragraphs= explode('</p>', $post->body);
       $para=$paragraphs[0].'<div class="top_add adds"><ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9620690561069746" data-ad-slot="5320733035" data-ad-format="auto" data-full-width-responsive="true"></ins></div>';
       $body=str_replace($paragraphs[0],$para,$post->body);
        return view('pages.post.show', compact('post', 'previous', 'next', 'tags', 'post_saved', 'body'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check()) {
        
        //check if people with access is going to edit
        if(auth()->user()->category=="Admin" || auth()->user()->category=="Contributor" || auth()->user()->category=="Editor")
        {
            $post=Post::find($id);
            //if contributor, check if going to edit his own post
            if(auth()->user()->category=="Contributor" and auth()->user()->id!=$post->user_id)
            {
                return view('pages.noaccess');

            }
            $categories=Category::all();
            return view('pages.post.edit', compact('post', 'categories'));
            

        }
        //else send to no access page
        else
        {
            return view('pages.noaccess');
        }
    }
    else
        {
            return view('pages.noaccess');
        }

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['title'=>'required', 
        'body'=>'required',
        'cover'=>'image|mimes:jpg,jpeg,png,bmp,tiff |max:4096'
        ]);
        $post=Post::find($id);
        $image = $request->file('cover');
        if(isset($image)){
        $slug = str_slug($request->title);
        $currentDate = Carbon::now()->toDateString();
        $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
        if (!file_exists('storage/blogImage')) {
            mkdir('storage.blogImage', 0777, true);
        }
        $image->move('storage/blogImage', $imagename);
    }
    else
    {
        $imagename=$post->cover_image;
    }
        
        $post->title=$request->title;
        $post->body=$request->body;
        $post->cover_image=$imagename;
        $post->email=$request->email;
        $post->name=$request->name;
        $post->category_id=$request->category;
        $post->seo_keywords=$request->seokey;
        $post->tags=$request->tag;
        $post->viewcount=0;                
        $post->save();
        
        //delete previous tags and seos
        $prev_tags=TagPost::where('post_id', $id)->get();
        $prev_seos=SeoPost::where('post_id', $id)->get();
        foreach ($prev_tags as $tag)
        {
            $tag->delete();
        }
        foreach($prev_seos as $seo)
        {
            $seo->delete();
        }
        $seo=explode(',', $request->seokey);
        foreach($seo as $keyword)
        {
            //add to seo keyword table
            $seo=SeoKeyword::where('keyword', $keyword)->first();
            if (empty($seo))
            {
                $seo=new SeoKeyword;
                $seo->keyword=$keyword;
                $seo->save();
                
            }
            //update seo post table
            $seo_post=new SeoPost();
            $seo_post->seo_id=$seo->id;
            $seo_post->post_id=$post->id;
            $seo_post->save();
        }
        
        $tags=explode(',', $request->tag);
        foreach($tags as $tagname)
        {
            //add to tag table
            $tag=Tag::where('tagname',$tagname)->first();
            if (empty($tag))
            {
                $tag=new Tag;
                $tag->tagname=$tagname;
                $tag->save();
                
            }
            //update tag post table
            $tag_post=new TagPost;
            $tag_post->tag_id=$tag->id;
            $tag_post->post_id=$post->id;
            $tag_post->save();
        }

        if (auth()->user()->category=="Admin" || auth()->user()->category=="Editor" )
        {
            return redirect('backend/posts');

        }
        elseif(auth()->user()->category=="Contributor")
        {
            return redirect('backend/myposts');

        }
                
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
         //check if people with access is going to edit
         if(auth()->user()->category=="Admin" || auth()->user()->category=="Contributor" || auth()->user()->category=="Editor")
         {
            $post=Post::find($id);
            //if contributor, check if going to edit his own post
            if(auth()->user()->category=="Contributor" and auth()->user()->id!=$post->user_id)
            {
                return view('pages.noaccess');

            }
            $post->delete();
            if (auth()->user()->category=="Admin" || auth()->user()->category=="Editor" )
            {
                return redirect('backend/posts');

            }
            elseif(auth()->user()->category=="Contributor")
            {
                return redirect('backend/myposts');

            }
             
 
         }
         //else send to no access page
         else
         {
             return view('pages.noaccess');
         }
        }
        else
         {
             return view('pages.noaccess');
         }

        
       
    }
    public function searchkeyword(Request $request)
    {
        // dd($request);
        $keyword= $request->search;
        $posts=Post::where('title', 'like', '%'.$keyword.'%')->orderBy('published_at', 'DESC')->paginate(20);
        $type="keyword";

        return view('pages.post.searchresult', compact('posts', 'type', 'keyword'));
        
    }
    public function searchtag($tag)
    {
        // dd($request);
        $keyword= $tag;
        $tagfind=Tag::where('tagname', $keyword)->first();
        $tagid=$tagfind->id;
        $posts=Post::where('tags', 'like', '%'.$keyword.'%')->orderBy('published_at', 'DESC')->paginate(20);
        $type="tag";

        return view('pages.post.searchresult', compact('posts', 'type', 'keyword'));
        
    }
    public function saved_post()
    {
        // dd($request);
        // $keyword= $request->search;
        $bookmarks=Bookmark::where('user_id', auth()->user()->id)->get();
        $bookmarked_post=[];
        foreach($bookmarks as $bookmark)
        {
            $bookmarked_post[]=Post::find($bookmark->post_id);
        }
        $posts=collect( $bookmarked_post);
        //dd($posts);
        $keyword= "My Saves";
        $type="bookmark";
        
        // $posts = Bookmark::table('bookmarks')
        //     ->select()
        //     ->join('posts', 'bookmarks.posts_id', '=', 'posts.id')
        //     ->join('users', 'bookmarks.user_id', '=', 'user.id')
        //     ->get();
    
        return view('pages.post.searchresult', compact('posts', 'type', 'keyword'));
        
    }
    public function addbookmark($id)
    {
        $bookmark=new Bookmark;
        $bookmark->post_id= $id;
        $bookmark->user_id= auth()->user()->id;
        $bookmark->save();
        return redirect('posts/'.$id);


    }
    public function removebookmark($id)
    {
        $bookmark=Bookmark::where('user_id', auth()->user()->id)->where('post_id', $id)->first();
        $bookmark->delete();
        return redirect('posts/'.$id);

    }
}
