<?php

namespace App\Http\Controllers;

use App\Navigation;
use Illuminate\Http\Request;

class NavigationsController extends Controller
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
        $navigations = Navigation::all();
        return view('backend.navigation.index')->withNavigations($navigations);
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
        $this->validate($request, [
        'menu_name' => 'required|max:255',
      ]);
        $navigation = new Navigation;
        $navigation->menu_name = $request->menu_name;
        $navigation->url = $request->url;
        $navigation->parent_id = $request->parent_id;
        $navigation->save();
        return redirect()->route('navigations.index',$navigation->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $items = Navigation::all();
        $navigation = Navigation::find($id);
        return view('backend.navigation.edit')->withNavigation($navigation)->withItems($items);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Navigation $navigation)
    {
         $this->validate($request, [
        'menu_name' => 'required|max:255',
      ]);
        $navigation->menu_name = $request->menu_name;
        $navigation->url = $request->url;
        $navigation->parent_id = $request->parent_id;
        $navigation->save();
        return redirect()->route('navigations.index',$navigation->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $navigation = Navigation::find($id);
         $navigation->delete();
     return redirect()->route('navigations.index');
    }
}
