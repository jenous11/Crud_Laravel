@extends('layouts.blog')
@section('content')
<form action="/posts" method="POST" enctype="multipart/form-data">
  @csrf
title:
  <input type="text" name="title">
text:
  <input type="textarea" name="text">
category_id:
  <input type="number" name="category_id">
  image:
  <input type="file" name="image" id="image" accept="image/*" >
  <button type="submit">Submit</button>
</form>
@endsection
