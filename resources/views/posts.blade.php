<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <h3 class ="text-xl">Welcome To My Blog</h3>

  @foreach ($posts as $post) 
  <article class="py-8 max-w-screen-md border-b border-grey-300">
    <a href="/post/{{ $post['slug'] }}" class="hover:underline">
      <h2 class="mb-1 text-3xl tracking-tight font-bold text-black-500">{{ $post['title'] }}</h2>
    </a>
    <div >
      <a href="/authors/{{ $post->author->username }}" class="hover:underline text-base text-gray-500 ">{{ $post->author->name }} </a> | {{ $post->created_at->diffForHumans() }}
      in
      <a href="/categories/{{ $post->category->slug }}" class="hover:underline text-base text-gray-500 ">{{ $post->category->name }}</a>
    </div>
    <p class="my-4 font-light">{{ Str::limit($post['body'], 100) }}</p>
    <a href="/post/{{ $post['slug'] }}" class="font-medium text-blue-500 hover:underline">Read More &raquo;</a>
  </article>
  @endforeach
  


    
  </x-layout>