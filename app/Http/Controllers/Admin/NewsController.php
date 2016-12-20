<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.news.create', compact('users'));
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

        $news = new News();
        $news->title = $request->get('title');
        $news->text = $request->get('text');
        $news->user_id = $request->get('user_id');
        $news->save();

        return redirect()->route('admin::news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::all();
        view('admin.news.show', compact('news'));
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
        $news = News::findOrFail($id);
        return view('admin.news.update', compact('news','users'));
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

        $news = News::findOrFail($id);
        $news->title = $request->get('title');
        $news->text = $request->get('text');
        $news->user_id  = $request->get('user_id');
        $news->save();

        return redirect()->route('admin::news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteModel = News::findOrFail($id);
        $deleteModel->delete();

        return redirect()->back();
    }
}
