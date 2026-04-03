<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;



class PostController extends Controller
{
    public function show($id)
    {
        $post=Post::findOrFail($id); // find the post by id from URL if not found it will throw 404 error_clear_last
        return view('post',compact('post')); // sends it to the view
        //what compact does
        // It takes a string of the variable name and automatically creates the array for you:
          
        // old way you already know
// return view('post', ['post' => $post]);
    }
}
