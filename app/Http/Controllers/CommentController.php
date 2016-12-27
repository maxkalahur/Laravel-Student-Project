<?php

namespace App\Http\Controllers;

use App\News;
use App\Article;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function newsComment(Request $request, $id)
    {
        if(Auth::user()) {
            $file = request()->file('fileField')->store('files');
            $news = News::find($id);
            $comment = new Comment;
            if(!empty($request->get('comment'))) {
                $comment->text = $request->get('comment');
                $comment->post_id = $id;
                $comment->author()->associate(Auth::user());
                $comment->parent = 0;
                if(request()->hasFile('fileField')) {
                    $file = request()->file('fileField')->store('files');
                    $comment->file=request()->file('fileField')->getClientOriginalName();
                    dump($comment);
                }
                $comment->save();
            }
            return redirect()->route('news::view', $news->slug);
        } else {
            return redirect()->route('login');
        }
    }
    public function articleComment(Request $request, $id)
    {
        if(Auth::user()) {
            $articles = Article::find($id);
            $comment = new Comment;
            if(!empty($request->get('comment'))) {
                $comment->text = $request->get('comment');
                $comment->post_id = $id;
                $comment->author()->associate(Auth::user());
                $comment->parent = 1;
                if(request()->hasFile('fileField')) {
                    $file = request()->file('fileField')->store('files');
                    $comment->file=request()->file('fileField')->getClientOriginalName();
                }
                $comment->save();
            }
           return redirect()->route('article::view', $articles->slug);
        } else {
           return  redirect()->route('login');
        }
    }
    public function downloadFiles()
    {
        return  response()->download(storage_path('app/files/db2ec09cfa4c899c222a2ea061564207.txt'));
    }
}
