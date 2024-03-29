<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

// use Path\To\DOMDocument;
// use Intervention\Image\ImageManagerStatic as Image;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Alert;
use App\Models\Subscriber;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $post = Post::latest();

        if (request('search')) {

            $post->where('title', 'like', '%' . request('search') . '%');
        }

        return view('dashboard.posts.index', [

            "posts" => $post->where('user_id', auth()->user()->id)->paginate(10),
            "title" => "My Posts"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'title' => 'Create Posts'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $post = new Post; 
        // $post->title = $request->title;
        // $post->slug = Str::slug($post->title, '-'); 
    

        $validatedData = $request->validate([

            'title' => 'required|max:255',
            'slug' => Str::slug($request->title, '-'),
            'published_at' => 'max:120',
            'category_id' => 'required',
            'tag_id' => 'required',
            'description' =>'required',
            'image' => 'image|file|max:2048',
            'body' => 'required'
        ]);

       
        // -------------------------------------------------------------
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 20);

        $validatedData['category_id'] = json_encode($validatedData['category_id']);
        $validatedData['tag_id'] = json_encode($validatedData['tag_id']);
        //    dd($validatedData);

        Post::create($validatedData);
        $request->session(Alert::success('success', 'Post ditambahkan sebagai draft!'));
        return redirect('/dashboard/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    // public function show(Post $post)
    // {
    //     return view('dashboard.posts.show', [
    //         'post' => $post,
    //         'title' => $post['title']
    //     ]);
    // }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Request $request)
    {

        // if (Gate::allows('update-post')) {
        //     // akses logic untuk user dengan role admin
        //  } else {
        //     // akses logic untuk user selain role admin
        //  }
        

         if (auth()->user()->id == $post->user_id) {
            // return true;
            return view('dashboard.posts.edit', [
                'post' => $post,
                'title' => 'Edit Post',
                'tags' => Tag::all(),
                'categories' => Category::all()
            ]);
        } else{
            $request->session(Alert::error('error', 'Tidak bisa edit postingan Author lain!!'));
            return redirect('/dashboard/posts');
        }
       
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if (auth()->user()->id == $post->user_id) {


            $validatedData = $request->validate([

                    'title' => 'required|max:255',
                    'slug' => Str::slug($request->title, '-'),
                    // 'published_at' => 'max:120',
                    'category_id' => 'required',
                    'tag_id' => 'required',
                    'description' =>'required',
                    // 'is_published' => 'max:1',
                    'image' => 'image|file|max:2048',
                    'body' => 'required'
                ]);
            
        

        // if ($request->slug != $post->slug) {
        //     $rules['slug'] = 'required|unique:posts';
        // }

        // $validatedData = $request->validate($rules);

        //    cek jika ada gambar yg di upload maka tampilkan gambar dari storage
        if ($request->file('image')) {

            // jika di edit,maka hapus gambar lama.
            if ($request->oldImage) {

                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        $validatedData['category_id'] = json_encode($validatedData['category_id']);
        $validatedData['tag_id'] = json_encode($validatedData['tag_id']);

        Post::where('id', $post->id)

            ->update($validatedData);

        $request->session(Alert::success('success', 'Post berhasil diperbarui!'));
        return redirect('/dashboard/posts');

    } else{
        $request->session(Alert::error('error', 'Tidak bisa edit postingan Author lain!!'));
        return redirect('/dashboard/posts');
    }
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Post $post)
    {
        if (auth()->user()->id == $post->user_id) {

        if ($post->image) {
            Storage::delete($post->image);
        }

        Post::destroy($post->id);

        
        $request->session(Alert::success('success', 'Post berhasil di hapus!'));
        return redirect('/dashboard/posts');

    } else{
        $request->session(Alert::error('error', 'Tidak bisa hapus postingan Author lain!!'));
        return redirect('/dashboard/posts');
    }

    }

   

    // count-----------------------------------------------------------
    public function count(Post $post, Tag $tag,Contact $contact , Category $category)
    {


         
        
        
        return view('dashboard.index', [
            'post' => $post->where('user_id', auth()->user()->id)->count(),
            'category' => Category::all()->count(),
            'tag' => Category::all()->count(),
            'posts' => $post->where('user_id', auth()->user()->id)->latest('total_views')->simplepaginate(5),
            'sum_views' => Post::where('user_id', auth()->user()->id)->sum('total_views'),
            'subs' => Subscriber::all()->count()
        ]);
    }

     

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);


    }


    public function updatepublished(Request $request,$id)
    {

        
        $post = Post::find($id);
        
        $post->published_at = $request->input('published_at');
        $post->is_published = $request->input('is_published');

        $post->update();
        

            $request->session(Alert::success('success', 'Postingan telah terbit!'));
            return redirect('/dashboard/posts');

    }
}
