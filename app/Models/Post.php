<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['title', 'slug', 'category_id', 'image', 'body', 'author_id'];

    // fungsi with untuk mengambil data author dan category secara eger load

    /* kelebihan eger load adalah data author dan category akan diambil sekaligus dibandingkan dengan lazy load
        tapi kekurangannya adalah data author dan category akan diambil meskipun tidak digunakan

        kelebihan lazy load adalah data author dan category akan diambil ketika dipanggil saja,
        tapi kekurangannya adalah data author dan category akan diambil berkali-kali ketika dipanggil berkali-kali
    */
    
    protected $with = ['author', 'category'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $query, array $filters):void{
        $query->when($filters['search'] ?? false,
        fn($query, $search)=>
            $query->where('title', 'like', '%'.$search.'%')
        );

        $query->when($filters['category'] ?? false,
        fn($query, $category)=>
            $query->whereHas('category', fn($query)=>
                $query->where('slug', $category)
            )
        );

        $query->when($filters['author'] ?? false,
        fn($query, $author)=>
            $query->whereHas('author', fn($query)=>
                $query->where('username', $author)
            )
        );
    }   

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
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
