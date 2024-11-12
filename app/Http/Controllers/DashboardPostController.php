<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use HTMLPurifier;
use HTMLPurifier_Config;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

        return view('dashboard.posts.index', [
            'posts' => Post::where('author_id', auth()->user()->id)->get()
            // 'posts' => Post::where('author_id', Auth::user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'slug' => 'required|unique:posts',
        'category_id' => 'required',
        'body' => 'required'
    ]);

    // Bersihkan konten body menggunakan HTML Purifier
    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);
    $validatedData['body'] = $purifier->purify($validatedData['body']);

    $validatedData['author_id'] = auth()->user()->id;

    Post::create($validatedData);

    return redirect('/dashboard/posts')->with('success', 'New post has been added!');
}

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // Bersihkan konten body menggunakan HTML Purifier sebelum menampilkan
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        $post->body = $purifier->purify($post->body);
    
        return view('dashboard.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}