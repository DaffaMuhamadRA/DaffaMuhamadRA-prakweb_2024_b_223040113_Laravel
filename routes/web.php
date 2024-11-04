<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['nama' => 'Daphne Ananta', 'title' => 'About']);
});

Route::get('/posts', function () {
    return view('posts', [
        'title' => 'Blog',
        'posts' => [
            [
                'id' => '1',
                'slug' => 'judul-artikel-1',
                'title' => 'Judul Artikel 1',
                'author' => 'Daffa Muhamad',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi excepturi voluptatibus corporis laudantium. Animi, repellat veritatis accusamus, facilis laudantium aperiam blanditiis atque fugit pariatur assumenda provident. Praesentium et placeat ab.'
            ],

            [
                'id' => '2',
                'slug' => 'judul-artikel-2',
                'title' => 'Judul Artikel 2',
                'author' => 'Daffa Muhamad',
                'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odio harum ducimus minus. Odio nulla iste, modi reprehenderit at, cupiditate deserunt amet possimus doloribus recusandae incidunt ea, ipsum et porro fuga?'
            ]
        ]
    ]);
});

Route::get('/post/{slug}', function ($slug) {
    $post = [
        [
            'id' => '1',
            'slug' => 'judul-artikel-1',
            'title' => 'Judul Artikel 1',
            'author' => 'Daffa Muhamad',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi excepturi voluptatibus corporis laudantium. Animi, repellat veritatis accusamus, facilis laudantium aperiam blanditiis atque fugit pariatur assumenda provident. Praesentium et placeat ab.'
        ],

        [
            'id' => '2',
            'slug' => 'judul-artikel-2',
            'title' => 'Judul Artikel 2',
            'author' => 'Daffa Muhamad',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odio harum ducimus minus. Odio nulla iste, modi reprehenderit at, cupiditate deserunt amet possimus doloribus recusandae incidunt ea, ipsum et porro fuga?'
        ]
    ];

    $post = Arr::first($post, function ($post) use ($slug) {
        return $post['slug'] == $slug;
    });
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});