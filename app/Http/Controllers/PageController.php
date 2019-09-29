<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard()
    {
        
        return view('pages.dashboard');
    }
    public function categorypage($category_name)
    {
        $category=Category::where('name', $category_name)->first();
        $posts=Post::where('category_id', $category->id)->get();
        return view('pages.categorypage');
    }
}
