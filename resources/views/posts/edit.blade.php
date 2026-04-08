@extends('layouts.blog')
@section('content')

<form action="{{route('posts.update',$post->id) }}" method="POST">
  @csrf

title:
  <input type="text" name="title" value={{ $post->title}} placeholder={{ $post->title }}>
  <br>
text:
  <input type="textarea" name="text" value={{ $post->text  }} >
  <br>
category_id:
  <input type="number" name="category_id" value={{ $post->category_id }}>
  <br>
  <button type="submit">Submit</button>
  <br>
</form>

@endsection
