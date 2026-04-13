@extends('layouts.blog')
@section('content')
    <main class="container mx-auto mt-6 flex justify-center">
        <section class="w-3/5 bg-white p-6 shadow-md rounded-lg">
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')
                title:
                <input type="text" name="title" value={{ $post->title }} placeholder={{ $post->title }}>
                <br>
                text:
                <input type="textarea" name="text" value={{ $post->text }}>
                <br>
                category_id:
                <input type="number" name="category_id" value={{ $post->category_id }}>
                <br>
                <button type="submit">Submit</button>
                <br>
            </form>
        </section>
    </main>
@endsection
