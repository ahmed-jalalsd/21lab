<?php

namespace App\Http\Controllers;

use App\Download;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class DownloadsController extends Controller
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
      $downloads = Download::all();
      return view('backend.download.index', compact('downloads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::all();
        return view('backend.download.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $download = new Download();
      $this->validate($request, [
        'title' => 'required|max:255',
      ]);
      $download->title = $request->title;
      if($request->hasFile('media')) {
        $file = Input::file('media');
        $filename = time(). '-' .$file->getClientOriginalName();
        $download->mime = $file->getClientMimeType();
        $download->original_filename = $file->getClientOriginalName();
        $download->download_media = $filename;
        $file->move(public_path().'/images/downloads', $filename);
      }
      $download->save();
      $download->categories()->sync($request->categories, false);
      return redirect()->route('downloads.index' , $download->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $download = Download::find($id);
      return View('backend.download.show', compact('download'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function edit(Download $download)
    {
      $download = Download::find($download);
      $categories = Category::all();
      $categories2 = array();
      foreach ($categories as $category) {
        $categories2[$category->id] = $category->category_name;
      }//to format a variable for the select with form collective better use the nprmal html sentence
      return View('backend.download.edit')->withDownload($download)->withCategories($categories2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Download $download)
    {
      $this->validate($request, [
        'title' => 'required|max:255',
      ]);
      $download->title = $request->title;
      if($request->hasFile('media')) {
        $file = Input::file('media');
        $filename = time(). '-' .$file->getClientOriginalName();
        $download->download_media = $filename;
        $file->move(public_path().'/images/downloads', $filename);
      }
      $download->save();
      $download->categories()->sync($request->categories);
      return redirect()->route('downloads.show' , $download->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
      $download = Download::find($id);
      $download->categories()->detach();
      $download->delete();
     return redirect()->route('downloads.index');
     }
}
