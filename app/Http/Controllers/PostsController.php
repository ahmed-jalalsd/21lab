<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use File;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
       $this->middleware('auth');
     }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $posts = new Post();
      $this->validate($request, [
        'title' => 'required|max:255',
        'body' => 'required'
      ]);
      $posts->title = $request->title;
      $posts->body = $request->body;
      if($request->hasFile('media')) {
        $file = Input::file('media');
        $filename = time(). '-' .$file->getClientOriginalName();
        $posts->media = $filename;
        $file->move(public_path().'/images/media', $filename);
      }
      $posts->save();
      return redirect()->route('posts.show' , $posts->id);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
      $posts = Post::find($post);
      return View('backend.post.show')->withPosts($posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
      $posts = Post::find($post);
      return View('backend.post.edit')->withPosts($posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      $this->validate($request, [
        'title' => 'required|max:255',
        'body' => 'required'
      ]);
      if($request->hasFile('media')) {
        $file = Input::file('media');
        $filename = time(). '-' .$file->getClientOriginalName();
        $post->media = $filename;
        $file->move(public_path().'/images/media', $filename);
      }
      $post->title = $request->title;
      $post->body = $request->body;
      $post->update();
      return redirect()->route('posts.show' , $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
      if(!$post){
        return Redirect()->route('home');
      }
      $post->delete();
        return Redirect()->route('home');
     }
}
