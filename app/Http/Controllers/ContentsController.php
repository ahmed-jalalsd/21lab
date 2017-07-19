<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;
use File;

class ContentsController extends Controller
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
      return view('backend.content.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'title' => 'required|max:255',
        'body' => 'required'
      ]);
      $content = new Content();
      $content->title = $request->title;
      $content->body = $request->body;
      $content->save();
      return redirect()->route('contents.show' , $content->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
      $content = Content::find($content);
      return View('backend.content.show')->withContent($content);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        $content = Content::find($content);
        return View('backend.content.edit')->withContent($content);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
      $this->validate($request, [
        'title' => 'required|max:255',
        'body' => 'required'
      ]);
      $content->title = $request->title;
      $content->body = $request->body;
      $content->update();
      return redirect()->route('contents.show' , $content->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
      if(!$content){
        return Redirect()->route('home');
      }
      $content->delete();
        return Redirect()->route('home');
     }
}
