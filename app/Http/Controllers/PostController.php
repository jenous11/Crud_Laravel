<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
  public function index()
  {
    $posts = Post::latest('id')->get();
    return view('posts.index', compact('posts'));
  }

  public function show(Post $post)
  {
    return view('posts.post', compact('post'));
  }

  public function create()
  {
    return view('posts.create');
  }

  public function store(Request $request)
  {
    // dd($request->all());
    Post::create([
      'title' => $request->title,
      'text' => $request->text,
      'category_id' => $request->category_id
    ]);
    return redirect()->route('posts.post');
  }

  public function edit(Post $post)
  {
    return view('posts.edit',compact('post'));
  }


  public function update(Request $request, Post $post)
  {
    $post->update(['title'=>$request->title,'text'=>$request->text]);
    return redirect()->route('posts.index');

  }


  public function destroy(Post $post)
  {
  }

}
