@extends('layouts.blog')
@section('content')
<main class="container mx-auto mt-6 flex justify-center">
<section  class=" bg-white p-6 shadow-md rounded-lg w-sm" >
  <header class="text-center">Create Post</header>
  <form action="/posts" method="POST" enctype="multipart/form-data"  class="grid" >
  @csrf
title:
  <input type="text" name="title" class=" border-2 border-solid w-80" >
  <br>
text:
  <input type="textarea" name="text" class=" border-2 border-solid w-80" >
    <br>
category_id:
  <input type="number" name="category_id" class=" border-2 border-solid w-80" >
    <br>
  image:
  <input type="file" name="image" id="image" accept="image/*" class=" border-2 border-solid w-80"  >
    <br>
  <button type="submit" class="border border-solid  border-black w-24 bg-blue-400  rounded-2xl"  >Submit</button>
</form>
</section>
</main>

@endsection
