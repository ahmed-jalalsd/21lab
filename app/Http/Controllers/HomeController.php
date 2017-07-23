<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Download;
use App\Category;
use Illuminate\Support\Facades\Input;
use Storage;
use File;
use DB;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function show(Request $request)
    {
        $id = $request->id;
        $download = DB::table('downloads')->where('id', $id)->first();
        $file_path = public_path('/images/downloads').'/'.$download->download_media;
        return response()->download($file_path);

    }
}
