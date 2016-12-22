<?php

namespace App\Http\Controllers;

use App\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crudArticle',[
            'header'=>'Create new article'
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
            'title' => 'required|max:255',
            'text'=>'required'
        ));
        $article = new Articles;
        $article->title=$request->get('title');
        $article->text = $request->get('text');
        $article->user()->associate(Auth::user());
        $article->save();
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
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=Articles::findOrFail($id);
        return view('crudArticle', [
            'header'=>'Update article',
            'article'=>$article
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
        $article=Articles::findOrFail($id);
        $this->validate($request, array(
            'title' => 'required|max:255',
            'text'=>'required'
        ));
        $article->title=$request->get('title');
        $article->text=$request->get('text');
        $article->save();
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
        $article=Articles::findOrFail($id);
        $article->delete();
        return redirect()->back();
    }
}
