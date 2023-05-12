<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class TierController extends Controller
{
    public function index(Post $posts)
    {
        
        

        // get users list by most posts
        $users = User::withCount('post')->orderBy('post_count', 'DESC')->paginate(10);
        
        return view('dashboard.tier.index',[
            "title" => "Tier User",
            "users" => $users
        ]);
    }
}
