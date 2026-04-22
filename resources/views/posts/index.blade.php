@php
use Illuminate\Support\Str;
use App\Models\Post;
@endphp
@extends('layouts.blog')
@section('content')
<main class="container mx-auto mt-6 flex justify-center">
  <section class="w-3/5 bg-white p-6 shadow-md rounded-lg">
     <img src="{{ asset('images/alexander-grey-P3IJy9JMsiU-unsplash.jpg') }}" alt="">
    @foreach($posts as $post)
    {{-- {{dd( $post->image)}} --}}
    <h1 class="text-lg font-semibold"><a href="{{ route('posts.show',$post->id) }}" class="hover:underline">{{ $post->title}}</a></h1>


@if($post->image)
    <img src="{{ asset('images/'.$post->image) }}" class="w-full object-cover rounded mb-4">
@else
    <img src="{{ asset('images/placeholder-800x400.png') }}" class="w-full object-cover rounded mb-4">
@endif
        {{-- <p class="text-gray-600 mb-4">Published on <span class="font-semibold">{{ $post->created_at }}</span></p> --}}
        <div class="text-gray-800 space-y-4">
          <p>{{ Str::limit($post->text, 2) }}</p>
          <hr>
        </div>
        @endforeach
    </section>
</main>
@endsection
