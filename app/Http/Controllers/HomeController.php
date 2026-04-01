<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    //
    public function index(){
  // $categories=DB::table('categories')->get();
  #eloquent orm

  $categories=Category::all();

  $posts=Post::when(request('category_id'),function($query){

  $query->where('category_id', request('category_id'));

    })
    
  ->latest('id')

  ->get();

  return view('home',['categories'=>$categories,'posts'=>$posts]);
    }
}
//using eloquent orm
