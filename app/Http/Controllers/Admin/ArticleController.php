<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.article.show',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.article.create', compact('users'));
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
            'title' => 'required|min:1',
            'text' => 'required|min:5'
        ]);

        $article = new Article();
        $article->title = $request->get('title');
        $article->text = $request->get('text');
        $article->user_id = $request->get('user_id');
        $article->save();

        return redirect()->route('admin::article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articles = Article::all();
        view('admin.article.show', compact('articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $article = Article::findOrFail($id);
        return view('admin.article.update', compact('article','users'));
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
        $this->validate($request, [
            'title' => 'required|min:1',
            'text' => 'required|min:3'
        ]);

        $article = Article::findOrFail($id);
        $article->title = $request->get('title');
        $article->text = $request->get('text');
        $article->user_id  = $request->get('user_id');
        $article->save();

        return redirect()->route('admin::article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteModel = Article::findOrFail($id);
        $deleteModel->delete();

        return redirect()->back();
    }
}
