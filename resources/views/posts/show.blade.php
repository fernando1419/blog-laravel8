<x-app-layout>
   <div class="container py-8">
      <h1 class="text-4xl font-bold text-gray-600"> {{ $post->name }} </h1>
      <div class="text-lg text-gray-500 mb-2">
         {!! $post->extract !!}
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
         {{-- Main Content --}}
         <div class="lg:col-span-2">
            <figure class="figure">
               <img class="w-full h-80 object-cover object-center" src="@if ($post->image)
                     {{ Storage::url($post->image->url) }}
                  @else
                     https://via.placeholder.com/300x200?text=No+Image+Uploaded+Yet+...
                  @endif">
               <figcaption class="figure-caption text-xs-right"></figcaption>
            </figure>
            <div class="text-base text-gray-500 mt-4">
               {!! $post->body !!}
            </div>
         </div>

         {{-- Related Content --}}
         <aside>
            <h1 class="text-2xl font-bold text-gray-600 mb-4"> More in {{ $post->category->name }} </h1>
            <ul>
               @foreach ($similarPosts as $item)
                  <li class="mb-4">
                     <a class="flex" href="{{ route('posts.show', $item) }}">
                        <img class="w-36 h-24 object-cover object-center" alt="{{ $item->name }}" src="@if ($item->image)
                           {{ Storage::url($item->image->url) }}
                        @else
                           https://via.placeholder.com/300x200?text=No+Image+Uploaded+Yet+...
                        @endif">
                        <span class="ml-2 text-gray-600"> {{ $item->name }} </span>
                     </a>
                  </li>
               @endforeach
            </ul>
         </aside>
      </div>
   </div>
</x-app-layout>
