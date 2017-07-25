<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LeftFooter;

class LeftFootersController extends Controller
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
        $lefts = LeftFooter::all();
      return view('backend.left-footer.index', compact('lefts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
        return view('backend.left-footer.create');
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
        'description' => 'required'
      ]);
        $footerLeft = new LeftFooter();
        $footerLeft->title = $request->title;
        $footerLeft->description = $request->description;
        $footerLeft->save();
        return redirect()->route('leftfooter.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $left = LeftFooter::find($id);
        return view('backend.left-footer.show')->withLeft($left);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $left = LeftFooter::find($id);
        return view('backend.left-footer.edit')->withLeft($left);
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
        $footerLeft = LeftFooter::find($id);
         $this->validate($request, [
        'title' => 'required|max:255',
        'description' => 'required'
      ]);
        $footerLeft->title = $request->title;
        $footerLeft->description = $request->description;
        $footerLeft->update();
        return redirect()->route('leftfooter.index', $footerLeft->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $left = LeftFooter::find($id);
        $left->delete();
     return redirect()->route('leftfooter.index');
    }
}
