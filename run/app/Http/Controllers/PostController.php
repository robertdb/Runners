<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
  public function index()
  {
    $posts = Post::with('user')->orderBy('created_at', 'desc')->get();

    return view('home.home', ['posts' => $posts]);
  }
  public function store(Request $request)
  {
    $this->validate($request, [
        'body' => 'required|max:1000'
    ]);
    $post = new Post();
    $post->body = $request['body'];
    //$message = 'Hubo un error';
    if ($request->user()->posts()->save($post)) {
        //$message = 'Publicacion subida con exito';
    }
    return redirect()->route('home');
  }

  public function edit(Request $request)
  {
    $this->validate($request, [
        'body' => 'required'
    ]);
    $post = Post::find($request['postId']);
    /*$user= User::find($post->user_id);
    if (Auth::user() != $user) {
        return redirect()->back();
    }*/
    $post->body = $request['body'];
    $post->save();
    return $request;
  }

  public function delete($id)
  {
    $post = Post::where('id', $id)->first();
    /*if (Auth::user() != $post->user) {
        return redirect()->back();
    }*/
    $post->delete();
    return redirect()->route('home');
  }
}
