<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\PseudoTypes\True_;

class PostController extends Controller
{


    public function index()
    {
        $post = Post::with('author')->where('is_published', true)->filter(request(['search']))->latest()->paginate(15);
        
        $title = '';
        if(request('category'))
        {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' Topik : ' . $category->name;
            $post = Post::where('category_id','LIKE','%'. $category->id.'%')->simplepaginate(18)->withQueryString();
        }
        if(request('tag'))
        {
            $tag = Tag::firstWhere('slug', request('tag'));
            $title = '  Tag : ' . $tag->name;
            $post = Post::where('tag_id','LIKE','%'. $tag->id.'%')->simplepaginate(18)->withQueryString();
        }
        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = $author->username . '  ' ;
            $post = Post::where('user_id',$author->id)->simplepaginate(18)->withQueryString();
        }

        
        return view('posts', [

            "title" => "Blog" . $title,
           
            "posts" => $post,
        ]);
    }

    public function show(Post $post)
    {
       
        // menampilkan semua post terkait kecuali yang sedang terbuka
        // $related= Post::where('category_id', '=', $post->category_id)
        //     ->where('id', '!=', $post->id)
        //     ->get();

        //    $related = Post::where('category_id', $post->category_id)->where('id', '!=', $post->id)->paginate(4);
           $latest = Post::with('author')->where('id', '!=', $post->id)->where('is_published', true)->latest()->simplepaginate(5);

        //    dd($related);
        
        return view('post', [
            "post" => $post,
            "title" => $post['title'],
            "twitter" =>  DB::table('users')->where('twitter', TRUE)->first(),
            "latest" => $latest
            // "related" => $related
        ]);
        
    }

    public function category(Category $category)
    {

       $category = Category::latest()->paginate(16);

    //    dd($category);

        
        return view('categories',[

            "title" => "Topik",
            "categories" => $category

        ]);
    }


    
}
