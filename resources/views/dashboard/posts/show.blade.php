@extends('dashboard.layouts.main')

@section('container')
<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
        <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-4 lg:mb-6 not-format">
              <a href="/dashboard/posts" class="btn btn-success font-medium text-sm text-blue-600 hover:underline">&laquo; Back To All Posts</a>
              <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning font-medium text-sm text-blue-600 hover:underline"><i class="bi bi-pencil"></i> Edit</a>
              <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are You Sure ?')"><i class="bi bi-trash mt-1 text-dark"></i> Delete</button>
              </form>
                <address class="flex items-center my-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                        <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="{{ $post->author->name }}">
                        <div>
                            <a href="/posts?author={{ $post->author->username }}" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
  
                            <p class="text-base text-gray-500 dark:text-gray-400 mb-2">
                              {{ $post->created_at->diffForHumans() }}
                            </p>
                            <a href="/posts?category={{ $post->category->slug }}">
                              <span class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800 hover:underline">
                                {{ $post->category->name }}
                              </span>
                            </a>
                        </div>
                    </div>
                </address>
                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $post->title }}</h1>
            </header>
            
            @if ($post->image)
              <div class="mb-6 not-format">
                <img class="w-full h-96 object-cover rounded-lg" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}">
              </div>
            @endif

            <p>{{ strip_tags($post->body) }}</p>

        </article>
    </div>
  </main>
  @endsection

  