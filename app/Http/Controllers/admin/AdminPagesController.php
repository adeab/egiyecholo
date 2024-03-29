<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use Visitor;
use Carbon\Carbon;
use View;
use Auth;
use Illuminate\Support\Facades\Hash;
use Facebook\InstantArticles\Client\Client;
use Facebook\InstantArticles\Transformer\Transformer;
use Facebook\InstantArticles\Elements\InstantArticle;
// use Facebook\InstantArticles\Elements\InstantArticle;
use Facebook\InstantArticles\Elements\Header;
use Facebook\InstantArticles\Elements\Time;
use Facebook\InstantArticles\Elements\Ad;
use Facebook\InstantArticles\Elements\Analytics;
use Facebook\InstantArticles\Elements\Author;
use Facebook\InstantArticles\Elements\Image;
use Facebook\InstantArticles\Elements\Video;
use Facebook\InstantArticles\Elements\Caption;
use Facebook\InstantArticles\Elements\Footer;
use Facebook\InstantArticles\Elements\Paragraph;
use Facebook\InstantArticles\Elements\Small;
// use Facebook\InstantArticles\Transformer\Transformer;
use Facebook\InstantArticles\Validators\Type;


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
use App\WpYoastSeoLink;

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
       
            // $slugs=WpYoastSeoLink::all();
            // foreach($slugs as $slug)
            // {
            //     $slug_array=explode('/', $slug->url);
            //     $actual_slug=end($slug_array);
            //     if($actual_slug=="")
            //     {
            //         $actual_slug=prev($slug_array);
            //     }
            //     $post=Post::find()
                
            // // }
            // $posts=Post::skip(5000)->take(1000)->get();
            // foreach($posts as $post)
            // {
            //     $post->slug=(strval($post->id).$post->title);
            //     $post->save();
            // }
            // $post=Post::first();
            // return preg_replace('/[*-^-A-Za-z0-9-]+/', '-', $post->title);
    
            $all_posts=Post::where('publication_status', 'Published')->orderBy('id', 'DESC')->paginate(20);
            return view('adminpanel.allposts', compact('all_posts'));
        }
        else
        {
            return view('pages.noaccess');
        }
        
         
    }
    public function search_post_list(Request $request)
    {
        
        
        // dd($request);
        if(auth()->user()->category=="Admin" || auth()->user()->category=="Editor")
        {
       
            // $slugs=WpYoastSeoLink::all();
            $keyword= $request->searchbox;
        // $posts=Post::
           
            $all_posts=Post::where('title', 'like', '%'.$keyword.'%')->orderBy('published_at', 'DESC')->paginate(20);
            return view('adminpanel.searchposts', compact('all_posts'));
        }
        else
        {
            return view('pages.noaccess');
        }
        
         
    }
    public function search_user_list(Request $request)
    {
        
        
        // dd($request);
        if(auth()->user()->category=="Admin" || auth()->user()->category=="Editor")
        {
       
            // $slugs=WpYoastSeoLink::all();
            $keyword= $request->searchbox;
        // $posts=Post::
           
        $all_users = User::where('email', 'like', '%'.$keyword.'%')->orderBy('id', 'DESC')->paginate(20);
        return view('adminpanel.searchusers', compact('all_users'));
        }
        else
        {
            return view('pages.noaccess');
        }
        
         
    }
    public function ia_post_list()
    {
        
        
        
        if(auth()->user()->category=="Admin" || auth()->user()->category=="Editor")
        {
       
        
            
            $all_posts=Post::where('facebookia', '1')->orderBy('id', 'DESC')->paginate(20);
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
    public function draft_post_list()
    {
        if(auth()->user()->category=="Admin" || auth()->user()->category=="Contributor" || auth()->user()->category=="Editor")
        {
            $all_posts=Post::where('publication_status', 'Draft')->orderBy('id', 'DESC')->paginate(20);
            return view('adminpanel.draftposts', compact('all_posts'));
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
        if(Hash::check($request->oldpassword, $hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            // return "all ok";
            Auth::logout();
            return redirect()->route('login')->with('success', "Password is Changed");

        }
        else{
            return redirect()->back()->with('error', "Current Password is Invalid");
        }   

    }
    public function publish_ia($post_id)
    {
        $post= Post::find($post_id);

        $article =
    InstantArticle::create()
        ->withCanonicalUrl('url("posts/'.$post->id.')')
        ->withHeader(
            Header::create()
                ->withTitle('Big Top Title')
                ->withSubTitle('Smaller SubTitle')
                ->withPublishTime(
                    Time::create(Time::PUBLISHED)
                        ->withDatetime(
                            \DateTime::createFromFormat(
                                'j-M-Y G:i:s',
                                '10-Feb-2016 10:00:00'
                            )
                        )
                )
                ->withModifyTime(
                    Time::create(Time::MODIFIED)
                        ->withDatetime(
                            \DateTime::createFromFormat(
                                'j-M-Y G:i:s',
                                '10-Feb-2016 10:00:00'
                            )
                        )
                )
                ->addAuthor(
                    Author::create()
                        ->withName($post->name)
                        // ->withDescription('Author more detailed description')
                )
                // ->addAuthor(
                //     Author::create()
                //         ->withName('Author in FB')
                //         ->withDescription('Author user in facebook')
                //         ->withURL('http://facebook.com/author')
                // )
                // ->withKicker('Some kicker of this article')
                ->withCover(
                    Image::create()
                        ->withURL('https://jpeg.org/images/jpegls-home.jpg')
                        ->withCaption(
                            Caption::create()
                                ->appendText('Some caption to the image')
                        )
                )
                // ->withSponsor(
                //     Sponsor::create()
                //         ->withPageUrl('http://facebook.com/my-sponsor')
                // )
        )
        // Paragraph1
        ->addChild(
            Paragraph::create()
                ->appendText($post->body)
        );
        // Paragraph2
        // ->addChild(
        //     Paragraph::create()
        //         ->appendText('Other text to be within a second paragraph for testing.')
        // )
        // Slideshow
        // ->addChild(
        //     SlideShow::create()
        //         ->addImage(
        //             Image::create()
        //                 ->withURL('https://jpeg.org/images/jpegls-home.jpg')
        //         )
        //         ->addImage(
        //             Image::create()
        //                 ->withURL('https://jpeg.org/images/jpegls-home2.jpg')
        //         )
        //         ->addImage(
        //             Image::create()
        //                 ->withURL('https://jpeg.org/images/jpegls-home3.jpg')
        //         )
        // )
        // Paragraph3
        // ->addChild(
        //     Paragraph::create()
        //         ->appendText('Some text to be within a paragraph for testing.')
        // )
        // Ad
        // ->addChild(
        //     Ad::create()
        //         ->withSource('http://foo.com')
        // )
        // Paragraph4
        // ->addChild(
        //     Paragraph::create()
        //         ->appendText('Other text to be within a second paragraph for testing.')
        // )
        // Analytics
        // ->addChild(
        //     Analytics::create()
        //         ->withHTML($fragment)
        // )
        // Footer
        // ->withFooter(
        //     Footer::create()
        //         ->withCredits('Some plaintext credits.')
        // );



        // $post=Post::find($id);
          // get previous user id
        // $previous = Post::where('id', '<', $post->id)->where('category_id', $post->category_id)->where('publication_status', 'Published')->orderBy('id','desc')->first();
        // get next user id
    //    $next = Post::where('id', '>', $post->id)->where('category_id', $post->category_id)->where('publication_status', 'Published')->orderBy('id')->first();
    //    $tags= TagPost::where('post_id', $post_id)->get();
        // $post is the object containing information from a blog post

        // $header =
        // Header::create()
        // ->withPublishTime(
        //     Time::create(Time::PUBLISHED)
        //     ->withDatetime(
        //         new DateTime($post->published_at, $date_time_zone)
        //     )
        // )
        // ->withModifyTime(
        //     Time::create(Time::MODIFIED)
        //     ->withDatetime(
        //         new DateTime($post->updated_at, $date_time_zone)
        //     )
        // );

        // $title = $post->title;

        // if ($title) {
        // $document = DOMDocument::loadHTML('<h1>'.$title.'</h1>');
        // $transformer->transform($header, $document);
        // }

        // $authors = $post->name;
        // foreach ($authors as $author) {
        // $author_element = Author::create();

        // if ($author->display_name) {
        // $author_element->withName($author->display_name);
        // }

        // $header->addAuthor($author_element);
        // }

        // // $header->withKicker($post->get_the_kicker());

        // $cover = $post->cover_image;
        // $image = Image::create()
        // ->withURL($cover["https://neilpatel.com/wp-content/uploads/2018/10/blog.jpg"]);
        // $header->withCover($image);
        // Instantiate an emptyInstant Article
        // $instant_article = InstantArticle::create();

        // Load the rules content file
        // $rules = file_get_contents("transformer/transformer-rules.json", true);

        // // Create the transformer and loads the rules
        // $transformer = new Transformer();
        // $transformer->loadRules($rules);

        // // Load a full post in HTML form
        // $post_html = file_get_contents($post->body, true);

        // // Parse HTML into a DOM structure (ignore errors during parsing)
        // libxml_use_internal_errors(true);
        // $document = new \DOMDocument();
        // $document->loadHTML($post_html);
        // libxml_use_internal_errors(false);

        // // Invoke transformer on the DOM structure
        // $transformer->transform($instant_article, $document);
        
        // // Render the InstantArticle markup format
        // $result = $instant_article->render();

        // // // Get errors from transformer
        // // $warnings = $transformer->getWarnings();

        // // Get errors from transformer
        // $warnings = $transformer->getWarnings();

        // Instantiate an API client
        $client = Client::create(
            '1892690367681906',
            '912867b128bbd564b1dd09eff889c789',
            'EAAa5ZAFEJFXIBANS0PxzZCpHmYSrqgo1MYUIkAZAakAkFYLJXPVSv5NKbhsSvaguf1QJnHI1eUhKS0PZB7ZAC9qazbYHm35hLokZCVFpZCmhCLcsC8W6YgYPcvJqkolUqCA2IStZAnGh8KD0DNwKkWLYWHT8RAW45mDBJLTivzIAoZBwmnkkjXlPw',
            '961051600677660'
        );

        // Push the article
        try {
            // $client->importArticle($instant_article, $take_live);
            $client->importArticle($article);
            $post->facebookia=1;
            $post->save();
        } catch (Exception $e) {
            echo 'Could not import the article: '.$e->getMessage();
        }
    }
    
        
}
