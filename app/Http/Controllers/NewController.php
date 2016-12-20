<?php

namespace App\Http\Controllers;

use App\Article;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('crudNews', [
            'header'=>"Create new news"
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'title'=>'required|max:255',
            'text'=>'required'
        ));
        $new= new News;
        $new->title=$request->get('title');
        $new->text=$request->get('text');
        $new->user()->associate(Auth::user());
        $new->save();
        return redirect()->route('home::');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new=News::findOrFail($id);
        return view('crudNews', [
            'header'=>'Update new',
            'new'=>$new
        ]);
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
        $new=News::findOrFail($id);
        $this->validate($request, array(
            'title'=>'required|max:255',
            'text'=>'required'
        ));
        $new->title=$request->get('title');
        $new->text=$request->get('text');
        $new->save();
        return redirect()->route('home::');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new=News::find($id);
        $new->delete();
        return redirect()->back();
    }
}
