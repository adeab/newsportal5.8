<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Category;

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
        //
        $categories=Category::all();
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
        // dd($request);
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
        $post->category_id=$request->category;
        if (Auth::check()) {
        $post->user_id=auth()->user()->id;
        $post->publication_status="Published";
        }
        else
        {
        $post->publication_status="Pending";
        }
        $post->save();
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
        $clientIP = \Request::ip();
        $post=Post::find($id);
        return view('pages.post.show', compact('post', 'clientIP'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post=Post::find($id);
        $categories=Category::all();
        return view('pages.post.edit', compact('post', 'categories'));
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
        $post->save();
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
        $post=Post::find($id);
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
}
