<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AdminPagesController extends Controller
{
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
        if(auth()->user()->category=="Admin" || auth()->user()->category=="Contributor" || auth()->user()->category=="Editor")
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
        if(auth()->user()->category=="Admin" || auth()->user()->category=="Contributor" || auth()->user()->category=="Editor")
        {
            return view('adminpanel.useradd');
        }
        else
        {
            return view('pages.noaccess');
        }
        
         
    }
    
}
