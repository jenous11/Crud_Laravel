@extends('layouts.blog')
@section('content')
<form action="/posts" method="POST">
  @csrf
title:
  <input type="text" name="title">
text:
  <input type="textarea" name="text">
category_id:
  <input type="number" name="category_id">
  <button type="submit">Submit</button>
</form>
@endsection
