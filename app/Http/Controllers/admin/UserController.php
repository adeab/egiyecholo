<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use Carbon\Carbon;
use App\Post;

class UserController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'email'=>'required|email|unique:users,email',
            'user_image'=>'image|required|mimes:jpg,jpeg,png,bmp,tiff |max:4096'
        ));
        $user_image = $request->file('user_image');
        $slug = str_slug($request->name);
 
        if (isset($user_image)) {
            $currentDate = Carbon::now()->toDateString();
            //in video title at first show slug then current date
            $user_imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $user_image->getClientOriginalExtension();
            //if folder exist then save other wise create video folder via mkdir
            if (!file_exists('storage/userImage')) {
                mkdir('storage.userImage', 0777, true);
            }
            $user_image->move('storage/userImage', $user_imagename);
        }
        else{
            $user_imagename = "default_user.jpg";
        }
        
        // dd($request);
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->number;
        $user->password=Hash::make($request->password);
        $user->category=$request->country;
        $user->profile_picture=$user_imagename;
        $user->save();
        return redirect('/backend/userlist');



    }
    public function storecontributor(Request $request)
    {
        $this->validate($request, array(
            'email'=>'required|email|unique:users,email',
            'user_image'=>'image|required|mimes:jpg,jpeg,png,bmp,tiff |max:4096'
        ));
        $user_image = $request->file('user_image');
        $slug = str_slug($request->name);
 
        if (isset($user_image)) {
            $currentDate = Carbon::now()->toDateString();
            //in video title at first show slug then current date
            $user_imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $user_image->getClientOriginalExtension();
            //if folder exist then save other wise create video folder via mkdir
            if (!file_exists('storage/userImage')) {
                mkdir('storage.userImage', 0777, true);
            }
            $user_image->move('storage/userImage', $user_imagename);
        }
        else{
            $user_imagename = "default_user.jpg";
        }
        
        // dd($request);
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->number;
        $user->password=Hash::make($request->password);
        $user->category=$request->usertype;
        $user->profile_picture=$user_imagename;
        $user->save();

        $publishtype=$request->country;
        $postid=$request->postid;
        $posts=Post::where('email', $user->email)->get();
        //make all post of this user published or only one
        if($publishtype=="all")
        {            
            foreach($posts as $post)
            {
                $post->publication_status="Published";
                $post->published_at=Carbon::now();
                $post->user_id=$user->id;
                $post->save();
            }


        }
        else
        {
            foreach($posts as $post)
            {
                $post->publication_status="Awaiting Publication";
                $post->user_id=$user->id;
                $post->save();
            }
            $selectedpost=Post::find($postid);
            $selectedpost->publication_status="Published";
            $selectedpost->published_at=Carbon::now();
            $selectedpost->save();

        }
        

        return redirect('/backend/pendings');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        return view('adminpanel.edituser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::find($id);
        $this->validate($request, array(
            'email'=>'required|email|unique:users,email',
            'user_image'=>'image|mimes:jpg,jpeg,png,bmp,tiff |max:4096'
        ));
        $user_image = $request->file('user_image');
        $slug = str_slug($request->name);
 
        if (isset($user_image)) {
            $currentDate = Carbon::now()->toDateString();
            //in video title at first show slug then current date
            $user_imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $user_image->getClientOriginalExtension();
            //if folder exist then save other wise create video folder via mkdir
            if (!file_exists('storage/userImage')) {
                mkdir('storage.userImage', 0777, true);
            }
            $user_image->move('storage/userImage', $user_imagename);
        }
        else{
            $user_imagename = $user->profile_picture;
        }
        
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->number;
        $user->password=Hash::make($request->password);
        $user->category=$request->country;
        $user->profile_picture=$user_imagename;
        $user->save();
        return redirect('/backend/userlist');
        // dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect('/backend/userlist');
        
    }
}
