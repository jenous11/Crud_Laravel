<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
  DB::update('UPDATE posts SET title = ?, text=?,category_id=? where id = ?',
   [$request->title, $request->text, $request->category_id, $post->id]);
 return redirect()->route('home');
  }


  public function destroy(Post $post)
  {
  }

}
