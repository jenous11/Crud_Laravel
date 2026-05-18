<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    {{-- we use a foreach here --}}
                    @foreach ($posts as $post )
                    <h1 class="text-lg font-semibold"><a href="{{ route('posts.show', $post->id) }}"
                        class="hover:underline">{{ $post->title }}</a></h1>


                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="w-full object-cover rounded mb-4">
                @else
                    <img src="{{ asset('images/placeholder-800x400.png') }}" class="w-full object-cover rounded mb-4">
                @endif
                {{-- <p class="text-gray-600 mb-4">Published on <span class="font-semibold">{{ $post->created_at }}</span></p> --}}
                <div class="text-gray-800 space-y-4">
                    <p>{{ Str::limit($post->text, 2) }}</p>
                    <hr>
                </div>
                      @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
