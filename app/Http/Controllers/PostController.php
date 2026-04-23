<?php
namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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
      dd($request->all(), $request->hasFile('image'), $request->file('image'));
    $data = [
        'title' => $request->title,
        'text' => $request->text,
        'category_id' => $request->category_id,
    ];

    // only store image if one was uploaded
    if($request->hasFile('image')){
        $data['image'] = $request->file('image')->store('images', 'public');
    }

    Post::create($data);
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

    if($request->hasFile('image')){
        if($post->image){
            Storage::disk('public')->delete($post->image);
        }
        $data['image'] = $request->file('image')->store('images', 'public');
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
