<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    {{-- <h3 class ="text-xl">Welcome To My Blog</h3> --}}


      <div class="py-4 px-4 mx-auto max-w-screen-xl lg:py-8 lg:px-0 ">
          
          <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
  @foreach ($posts as $post) 
  {{-- <article class="py-8 max-w-screen-md border-b border-grey-300">
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
  </article> --}}
  
            <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between items-center mb-5 text-gray-500">
                  <a href="/categories/{{ $post->category->slug }}">
                    <span class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800 hover:underline">
                      {{ $post->category->name }}
                    </span>
                  </a>
                      <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
                </div>
                <a href="/post/{{ $post->slug }}"><h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white hover:underline">{{ $post['title'] }}</h2></a>
                <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ Str::limit($post['body'], 100) }}</p>
                <div class="flex justify-between items-center">
                  <div class="flex items-center space-x-3">
                    <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="{{ $post->author->name }}" />
                    <a href="/authors/{{ $post->author->username }}" class="hover:underline">
                        <span class="font-medium text-sm dark:text-white">
                          {{ $post->author->name }}
                        </span> 
                        </a>
                    </div>
                    <a href="/post/{{ $post->slug }}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline text-sm">
                        Read more
                        <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </article> 
                             
        
  @endforeach
</div>  
</div>


    
  </x-layout>