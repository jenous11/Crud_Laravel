<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth')->except(['index', 'show']);
  }
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
    // dd('hit');
    $categories = Category::all();

    return view('posts.create', compact('categories'));
  }

  public function store(Request $request)
  {
    // dd($request->all(), $request->hasFile('image'), $request->file('image'));
    // dd($request->all());
    $request->validate([
      'title' => 'required',
      'text' => 'required'
    ]);
    $data = [
      'title' => $request->title,
      'text' => $request->text,
      'category_id' => $request->category_id,
      'user_id' => Auth::id(),
    ];
    // only store image if one was uploaded
    if ($request->hasFile('image')) {
      $data['image'] = $request->file('image')->store('images', 'public');
    }
    Post::create($data);
    return redirect()->route('posts.index');
  }

  public function edit(Post $post)
  {
    if (Auth::id() !== $post->user_id) {
      abort(403);
    }
    $categories = Category::all();
    // return view('posts.edit', compact('post'));if

    return view('posts.edit', compact('post', 'categories'));
  }

  public function update(Request $request, Post $post)
  {
    if (Auth::id() !== $post->user_id) {
      abort(403);
    }
    $request->validate([
      'title'=>'required',
      'text'=>'required'
    ]);

    $data = [
      'title' => $request->title,
      'text' => $request->text,
    ];
    if ($request->hasFile('image')) {
      if ($post->image) {
        Storage::disk('public')->delete($post->image);
      }
      $data['image'] = $request->file('image')->store('images', 'public');
    }
    $post->update($data);
    return redirect()->route('posts.index');
  }

  public function destroy(Post $post)
  {
    if (Auth::id() !== $post->user_id) {
      abort(403);
    }
    // $post->delete($post);
    // dd('hit');
    $post->delete();
    return redirect()->route('posts.index');
  }

//  public function dashboard(Post $post) {
// if(Auth::id()==$post->id){
//    return view('posts.post', compact('post'));

public function dashboard() {
    $posts = Post::where('user_id', Auth::id())->get();
    return view('dashboard', compact('posts'));
}
}
