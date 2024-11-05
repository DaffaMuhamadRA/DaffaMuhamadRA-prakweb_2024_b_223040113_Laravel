<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'slug', 'body'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    



    
    // public static function all()
    // {
    //     return [
    //         [
    //             'id' => '1',
    //             'slug' => 'judul-artikel-1',
    //             'title' => 'Judul Artikel 1',
    //             'author' => 'Daffa Muhamad',
    //             'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi excepturi voluptatibus corporis laudantium. Animi, repellat veritatis accusamus, facilis laudantium aperiam blanditiis atque fugit pariatur assumenda provident. Praesentium et placeat ab.'
    //         ],

    //         [
    //             'id' => '2',
    //             'slug' => 'judul-artikel-2',
    //             'title' => 'Judul Artikel 2',
    //             'author' => 'Daffa Muhamad',
    //             'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odio harum ducimus minus. Odio nulla iste, modi reprehenderit at, cupiditate deserunt amet possimus doloribus recusandae incidunt ea, ipsum et porro fuga?'
    //         ]
    //     ];
    // }
    // public static function find($slug): array
    // {
    //     // return $post = Arr::first(Post::all(), function ($post) use ($slug) {
    //     //     return $post['slug'] == $slug;
    //     // });

    //     $post = Arr::first(Post::all(), fn($post) => $post['slug'] == $slug);
    //     if (!$post) {
    //         abort(404);
    //     }
    //     return $post;
    // }
}
