<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <h3 class ="text-xl">Welcome To My Blog</h3>

  
  <article class="py-8 max-w-screen-md border-b border-grey-300">
    
      <h2 class="mb-1 text-3xl tracking-tight font-bold text-black-500">{{ $post['title'] }}</h2>
  
    <div class="text-base text-gray-500">
      <a href="#">{{ $post['author'] }} </a> | 1 Januari 2024
    </div>
    <p class="my-4 font-light">{{ $post['body'] }}</p>
    <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; Back To Posts </a>
  </article>
 
    

    
  </x-layout>