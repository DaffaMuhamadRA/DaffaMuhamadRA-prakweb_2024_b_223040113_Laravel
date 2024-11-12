<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;

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

// Route::get('/login', function () {
//     return view('logins.login', ['title' => 'login']);
// });
Route::get('/login', [LoginController::class, 'index'])->name('login')-> middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

