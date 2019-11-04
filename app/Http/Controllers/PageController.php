<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard()
    {
        $categories=Category::where('parent_category', 0)->where('id', '!=', 1)->get();
        $subcategories=Category::where('parent_category', '!=', 0)->get();
        $topposts=Post::orderBy('published_at', 'DESC')->take(5)->get();
        $all_posts=Post::orderBy('published_at', 'DESC')->get();
        // dd($all_posts[1]->id);
        
        return view('pages.dashboard', compact('categories', 'subcategories', 'topposts', 'all_posts'));
    }
    public function categorypage($category_name)
    {
        $category=Category::where('name', $category_name)->first();
        $posts=Post::where('category_id', $category->id)->orderBy('published_at', 'DESC')->paginate(20);
        return view('pages.categorypage', compact('category','posts'));
    }
    public function subcategorypage($category_parent,$category_name)
    {
        $category=Category::where('name', $category_name)->first();
        $posts=Post::where('category_id', $category->id)->orderBy('published_at', 'DESC')->paginate(20);
        return view('pages.categorypage', compact('category','posts'));
    }
}
