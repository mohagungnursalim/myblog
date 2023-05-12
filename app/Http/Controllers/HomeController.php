<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
class HomeController extends Controller
{
    public function index()

    {
       
        
    
        return view('home', [
            "title" => "Home",  
            "posts" => $post = Post::with('author')->latest()->take(3)->get()         
        ]);
    }

    
}
