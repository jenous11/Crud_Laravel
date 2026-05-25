<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller{
  public function index()
  {
    $users = User::all();
    $posts = Post::all();
    return view('admin.index', compact('users', 'posts'));
  }

  public function destroyPost(Post $post)
  {
    $post->delete();
    return redirect()->route('admin.index');
  }
  public function destroyUser(User $user)
  {
    $user->delete();
    return redirect()->route('admin.index');
  }
  public function editPost(Post $post)
  {
    $categories = Category::all();
    return view('admin.edit', compact('post', 'categories'));
  }
  public function updatePost(Request $request, Post $post)
  {
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
}
