<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use Visitor;
use Carbon\Carbon;

use App\WpUser;
use App\Category;
use App\WpTerm;
use App\WpTermRelationship;
use App\WpPost;
use App\WpPopularpostsdata;
use App\WpTermTaxonomy;
use App\SeoKeyword;
use App\SeoPost;
use App\Tag;
use App\TagPost;

class AdminPagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['upload_post']]);
    }
    public function dashboard()
    {
        if(auth()->user()->category=="Admin" || auth()->user()->category=="Contributor" || auth()->user()->category=="Editor")
        {
            $total_visitors= Visitor::count();
            $posts=Post::all();
            $posts_count=$posts->count();
            return view('adminpanel.dashboard', compact('total_visitors','posts_count'));
        }
        else
        {
            return view('pages.noaccess');
        }
        
         
    }
    public function user_list()
    {
        if(auth()->user()->category=="Admin" || auth()->user()->category=="Editor")
        {
            $all_users = User::where('id', '!=', auth()->id())->orderBy('id', 'DESC')->paginate(20);
            return view('adminpanel.userlist', compact('all_users'));
        }
        else
        {
            return view('pages.noaccess');
        }
         
    }
    public function user_add()
    {
        if(auth()->user()->category=="Admin" || auth()->user()->category=="Editor")
        {
            return view('adminpanel.useradd');
        }
        else
        {
            return view('pages.noaccess');
        }
        
         
    }
    public function post_list()
    {
        
        
        
        if(auth()->user()->category=="Admin" || auth()->user()->category=="Editor")
        {
            
            
        // $allposts=WpPost::where('post_type', 'attachment')->where('post_parent','!=', '0')->get();
        // // dd($allposts);
        
        // foreach ($allposts as $post)
        // {
        //     $post2=Post::find($post->post_parent);
        //     if(!empty($post2)){
        //     $post2->cover_image=$post->guid;
        //     $post2->save();
        //     }
        // }
        // $categories=Category::all();
        // foreach($categories as $category)
        // {
        //     $term=WpTerm::where('name', $category->name)->first();
        //     if(!empty($term)){
        //     $category->id=$term->term_id;
        //     $category->save();}
        // }
        
        // $rterm=WpTermRelationship::where('term_taxonomy_id', '10')->get();
        
        // foreach($rterm as $rt){
        //     $post=Post::find($rt->object_id);
        //     if(!empty($post)){
        //     $post->category_id=$rt->term_taxonomy_id;
        //     $post->save();
                
        //     }
        // }
        //5339
        // $posts=WpPost::where('post_status', 'publish')->where('post_type', 'post')->skip(4500)->take(1000)->get();
        // // dd(count($posts));
        // foreach($posts as $oldpost)
        // {
        //     $newpost=new Post;
        //     $newpost->id=$oldpost->ID;
        //     $newpost->title=$oldpost->post_title;
        //     $newpost->body=$oldpost->post_content;
        //     $newpost->user_id=$oldpost->post_author;
        //     $newpost->olddb=1;
        //     $newpost->published_at=$oldpost->post_date_gmt;
        //     $newpost->publication_status="Published";
        //     $newpost->category_id=1;
        //     $newpost->save();
        // }
        // $posts=Post::skip(4000)->take(1339)->get();
        // foreach($posts as $post)
        // {
        //     $user=WpUser::find($post->user_id);
        //     $post->name=$user->display_name;
        //     $post->email=$user->user_email;
        //     $post->save();
        // }
        // $wp=WpPopularpostsdata::take(1)->get();
        // dd($wp);
        
        
        
        // $posts=Post::skip(4500)->take(1500)->get();
        // foreach($posts as $post)
        // {
        //     $wp=WpPopularpostsdata::where('postid', $post->id)->first();
        //     if(!empty($wp))
        //     {
        //         $post->viewcount=$wp->pageviews;
        //         $post->save();
                            
        //     }
            
        // }
       
        // $users=WpUser::all();
        
        //get what are the tags 
       
        
        $users = User::where('id', '!=', auth()->id())->get();
        foreach($users as $user)
        {
            $user->category="N/A";
            $user->save();
        }
        
            
            $all_posts=Post::where('publication_status', 'Published')->orderBy('id', 'DESC')->paginate(20);
            return view('adminpanel.allposts', compact('all_posts'));
        }
        else
        {
            return view('pages.noaccess');
        }
        
         
    }
    
    public function pending_post_list()
    {
        if(auth()->user()->category=="Admin" || auth()->user()->category=="Editor")
        {
            $all_posts=Post::where('publication_status', 'Pending')->orWhere('publication_status', 'Awaiting Publication')->orderBy('id', 'DESC')->paginate(20);
            return view('adminpanel.pendingposts', compact('all_posts'));
        }
        else
        {
            return view('pages.noaccess');
        }
        
         
    }
    public function my_post_list()
    {
        if(auth()->user()->category=="Admin" || auth()->user()->category=="Contributor" || auth()->user()->category=="Editor")
        {
            $all_posts=Post::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->paginate(20);
            return view('adminpanel.myposts', compact('all_posts'));
        }
        else
        {
            return view('pages.noaccess');
        }
        
         
    }
    public function single_view($id)
    {
        if(auth()->user()->category=="Admin" || auth()->user()->category=="Contributor" || auth()->user()->category=="Editor")
        {
            $post=Post::find($id);
            return view('adminpanel.postshow', compact('post'));
        }
        else
        {
            return view('pages.noaccess');
        }
    }
    
    public function makecontributor($postid)
    {
        if(auth()->user()->category=="Admin" || auth()->user()->category=="Editor")
        {
            $post=Post::find($postid);
            return view('adminpanel.makecontributor', compact('post')); 
        }
        else
        {
            return view('pages.noaccess');
        }
        
         
    }
    public function publishpost($postid)
    {
        if(auth()->user()->category=="Admin" || auth()->user()->category=="Editor")
        {
            $post=Post::find($postid);
            $post->publication_status="Published";
            $post->published_at=Carbon::now();
            $post->save();
            return redirect('/backend/pendings');
        }
        else
        {
            return view('pages.noaccess');
        }
        
         
    }
    public function changepassword()
    {
        return view('adminpanel.password_change');
    }
    public function updatepassword(Request $request)
    {
        $this->validate($request, [
            'oldpassword'=>'required',
            'password' => 'required|confirmed'
        ]);
        $hashedPassword= Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedpassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success', "Password is Changed");

        }
        else{
            return redirect()->back()->with('error', "Current Password is Invalid");
        }   

    }
    
        
}
