<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about',['nama'=>'Daphne Ananta']);
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/email', function () {
    return view('email',['email'=>'Daphneananta@gmail.com','socialMedia'=>"@DaphneAnanta"]);
});