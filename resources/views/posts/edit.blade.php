@extends('layouts.blog')
@section('content')
    <main class="container mx-auto mt-6 flex justify-center">
        <section class=" bg-white p-6 shadow-md rounded-lg w-sm" >
            <header class="text-center"> Edit Post</header>
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="grid" >
                @csrf
                @method('PUT')
                id:
                <input type="number" name="id" value={{ $post->id }} placeholder={{ $post->id }}
                    class=" border-2 border-solid w-80" >
                <br>
                title:
                <input type="text" name="title" value={{ $post->title }} placeholder={{ $post->title }}
                    class=" border-2 border-solid w-80">
                <br>
                text:
                <input type="textarea" name="text" value={{ $post->text }} class=" border-2 border-solid w-80">
                <br>
                category_id:
                <input type="number" name="category_id" value={{ $post->category_id }} class=" border-2 border-solid w-80">
                <br>
                image:
                <input type="file" name="image" id="image" class="border-2 border-solid w-80" >
                <br>
                <button type="submit" class="border border-solid  border-black w-24 bg-blue-400  rounded-2xl">edit</button>
                <br>
            </form>
        </section>
    </main>
@endsection
