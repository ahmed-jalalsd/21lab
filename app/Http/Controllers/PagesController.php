<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Navigation;
use App\Category;
use App\Content;
use App\Download;
use App\Post;
use App\Image;
use App\LeftFooter;
use App\RightFooter;
use DB;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $sliders = DB::table('images')->select('images.*')
          ->where('flag_zippo', '=' , '1')
          ->get();

        $galleries = DB::table('images')->select('images.*')
          ->where('flag_zippo', '=' , '2')
          ->get();

        $content = Content::first();
        $taglessBody = strip_tags($content->body);

        $downloads = Download::with("categories")->get();
        $post = Post::first();

        $items = Navigation::tree();
        $leftfooter = LeftFooter::first();
        $taglessfooter= strip_tags($leftfooter->description);
        $rightfooter = RightFooter::first();

        return View('welcome', compact('sliders', 'galleries', 'content',
            'taglessBody', 'post','downloads', 'items', 'leftfooter', 'taglessfooter', 'rightfooter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($original_filename)
    {
        
        $download = Download::where('original_filename', '=', $original_filename)->firstOrFail();
        $file = Storage::disk('local')->get($download->original_filename);
        // dd($file);
 
        return (new Response($file, 200))->header('Content-Type', $download->mime);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
