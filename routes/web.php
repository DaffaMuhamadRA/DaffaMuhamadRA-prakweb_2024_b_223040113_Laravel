<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

use function Laravel\Prompts\search;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['nama' => 'Daphne Ananta', 'title' => 'About']);
});

Route::get('/posts', function () {

    // - fungsi with untuk mengambil data author dan category secara eger load
    // $posts = Post::with(['author','category'])->latest()->get();

    
    return view('posts', [
        'title' => 'Blog',
        'posts' => Post::filter(request(['search','category','author']))->latest()->paginate(20)->withQueryString()
    ]);
});

Route::get('/post/{post:slug}', function (Post $post) {

    // $post = Post::find($slug);
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});
Route::get('/authors/{user:username}', function (User $user) {
    // $posts = $user->posts->load(['category', 'author']);

    // $post = Post::find($slug);
    return view('posts', ['title' => count( $user->posts) . ' Articles By '.$user->name, 'posts' =>  $user->posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    // $posts = $category->posts->load(['category', 'author']);

    return view('posts', ['title' =>  ' Articles In : '.$category->name, 'posts' => $category->posts]);
});


Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});