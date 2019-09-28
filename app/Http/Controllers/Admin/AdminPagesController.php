<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;

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
            return view('adminpanel.dashboard');
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
            $all_users = User::where('id', '!=', auth()->id())->get();
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
            $all_posts=Post::where('publication_status', 'Published')->get();
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
            $all_posts=Post::where('publication_status', 'Pending')->get();
            return view('adminpanel.allposts', compact('all_posts'));
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
            $all_posts=Post::where('user_id', auth()->user()->id)->get();
            return view('adminpanel.myposts', compact('all_posts'));
        }
        else
        {
            return view('pages.noaccess');
        }
        
         
    }
    
        
}
