<?php

namespace App\Http\Controllers;

use App\RightFooter;
use Illuminate\Http\Request;

class RightFootersController extends Controller
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
        $rights = RightFooter::all();
        return view('backend.right-footer.index', compact('rights'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('backend.right-footer.create');
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
      ]);
        $right = new RightFooter();
        $right->title = $request->title;
        $right->email = $request->email;
        $right->phone = $request->phone;
        $right->save();
        return redirect()->route('rightfooter.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RightFooter  $rightFooter
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $right = RightFooter::find($id);
        return view('backend.right-footer.show')->withRight($right);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RightFooter  $rightFooter
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $right = RightFooter::find($id);
        return view('backend.right-footer.edit', compact('right'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RightFooter  $rightFooter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $right = RightFooter::find($id);
        $this->validate($request, [
        'title' => 'required|max:255',
      ]);
        $right->title = $request->title;
        $right->email = $request->email;
        $right->phone = $request->phone;
        $right->update();
        return redirect()->route('rightfooter.index', $right->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RightFooter  $rightFooter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $right = RightFooter::find($id);
         $right->delete();
     return redirect()->route('rightfooter.index');
    }

}