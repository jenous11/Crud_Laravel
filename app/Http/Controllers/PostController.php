<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;



class PostController extends Controller
{
public function index()
    {
        $posts=Post::latest('id')->get();
        return view('index',compact('posts'));
    }

    public function show(Post $post)  // Route Model Binding actual thing to learn
    // tyupe hinting laravel will automatically resolve the post by id from URL
    {
        // $post=Post::findOrFail($id); // find the post by id from URL if not found it will throw 404 error_clear_last
        return view('post',compact('post')); // sends it to the view
        //what compact does
        // It takes a string of the variable name and automatically creates the array for you:

        // old way you already know
// return view('post', ['post' => $post]);
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
