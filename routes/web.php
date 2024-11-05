<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;


Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['nama' => 'Daphne Ananta', 'title' => 'About']);
});

Route::get('/posts', function () {
    return view('posts', [
        'title' => 'Blog',
        'posts' => Post::all()
    ]);
});

Route::get('/post/{post:slug}', function (Post $post) {

    // $post = Post::find($slug);
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});
Route::get('/authors/{user}', function (User $user) {

    // $post = Post::find($slug);
    return view('posts', ['title' => 'Articles By '.$user->name, 'posts' => $user->posts]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});