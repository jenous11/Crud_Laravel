<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;



class PostController extends Controller
{
public function index()
    {
        $posts=Post::latest('id')->get();
        return view('posts.index',compact('posts'));
    }

    public function show(Post $post)  // Route Model Binding actual thing to learn
    // tyupe hinting laravel will automatically resolve the post by id from URL
    {
        // $post=Post::findOrFail($id); // find the post by id from URL if not found it will throw 404 error_clear_last
        return view('posts.post',compact('post')); // sends it to the view
        //what compact does
        // It takes a string of the variable name and automatically creates the array for you:

        // old way you already know
// return view('post', ['post' => $post]);
    }
    public function create()
    {
        // $title=$request('title');
        return view('posts.create');
    }

    public function store(Request $request)
    {
          // dd($request->all());
      Post::create([
        'title'=>$request->title,
        'text'=>$request->text,
        'category_id'=>$request->category_id]);

return redirect()->route('posts.post');

    }

    public function edit(Post $post)
    {
        //
    }
    public function update(Request $request, Post $post)
    {
        //
    }
    public function destroy(Post $post)
    {
        //
}
}
