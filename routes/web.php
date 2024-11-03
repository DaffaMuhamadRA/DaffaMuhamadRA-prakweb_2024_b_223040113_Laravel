<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['tittle' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['nama' => 'Daphne Ananta', 'tittle' => 'About']);
});

Route::get('/blog', function () {
    return view('blog', ['tittle' => 'Blog']);
});

Route::get('/contact', function () {
    return view('contact', ['tittle' => 'Contact']);
});