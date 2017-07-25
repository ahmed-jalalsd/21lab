<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ImagesController extends Controller
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
      $images = Image::paginate(4);
      return view('backend.image.index')->withImages($images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('backend.image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $image = new Image();
      if ($request->input('choose') == 1) {
        $image->slider_title = $request->slider_title;
        $image->slider_caption = $request->slider_caption;
        $image->flag_zippo = $request->choose;
        if($request->hasFile('slider_image')) {
          $file = Input::file('slider_image');
          $filename = time(). '-' .$file->getClientOriginalName();
          $image->slider_image = $filename;
          $file->move(public_path().'/images/slider', $filename);
        }
        }else{
          $image->gallery_title = $request->slider_title;
          $image->gallery_caption = $request->slider_caption;
          $image->flag_zippo = $request->choose;
          if($request->hasFile('slider_image')) {
            $file = Input::file('slider_image');
            $filename = time(). '-' .$file->getClientOriginalName();
            $image->slider_image = $filename;
            $file->move(public_path().'/images/gallery', $filename);
        }
    }
    $image->save();
    return  redirect()->route('images.show', $image->id);
  }


    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $image = Image::find($id);
      return View('backend.image.show')->withImage($image);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $image = Image::find($id);
      return View('backend.image.edit')->withImage($image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
      if ($request->input('choose') == 1) {
        $image->slider_title = $request->slider_title;
        $image->slider_caption = $request->slider_caption;
        $image->flag_zippo = $request->choose;
        if($request->hasFile('slider_image')) {
          $file = Input::file('slider_image');
          $filename = time(). '-' .$file->getClientOriginalName();
          $image->slider_image = $filename;
          $file->move(public_path().'/images/slider', $filename);
        }
        }else{

          $image->gallery_title = $request->gallery_title;
          $image->gallery_caption = $request->gallery_caption;
          $image->flag_zippo = $request->choose;

          if($request->hasFile('slider_image')) {
            $file = Input::file('slider_image');
            $filename = time(). '-' .$file->getClientOriginalName();
            $image->slider_image = $filename;
            $file->move(public_path().'/images/gallery', $filename);
        }
      }
    $image->update();
    return  redirect()->route('images.show', $image->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        $image->delete;
        return redirect()->route('images.index');
    }
}
