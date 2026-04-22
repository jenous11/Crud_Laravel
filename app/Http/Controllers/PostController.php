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
    $imagePath = $request->file('image')->store('images', 'public');

    Post::create([
        'title' => $request->title,
        'text' => $request->text,
        'category_id' => $request->category_id,
        'image' => $imagePath
    ]);
    return redirect()->route('posts.index');
}

  public function edit(Post $post)
  {
    return view('posts.edit',compact('post'));
  }


public function update(Request $request, Post $post)
{
    $data = [
        'title' => $request->title,
        'text' => $request->text,
    ];
    // only update image if a new one was uploaded
    if($request->hasFile('image')){
        $imagePath = $request->file('image')->store('images', 'public');
        $data['image'] = $imagePath;
    }

    $post->update($data);
    return redirect()->route('posts.index');
}

  public function destroy(Post $post)
  {
    // $post->delete($post);
    // dd('hit');
    $post->delete();
    return redirect()->route('posts.index');
  }

}
