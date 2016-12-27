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
            $news = News::find($id);
            $comment = new Comment;
            if(!empty($request->get('comment'))) {
                $comment->text = $request->get('comment');
                $comment->post_id = $id;
                $comment->author()->associate(Auth::user());
                $comment->parent = 0;
                if(request()->hasFile('fileField')) {
                    $comment->file=request()->file('fileField')->getClientOriginalName();
                    request()->file('fileField')->store($comment->file);
                }
                $comment->save();
            }
            return redirect()->route('news::view', $news->slug);
    }
    public function articleComment(Request $request, $id)
    {
            $articles = Article::find($id);
            $comment = new Comment;
            if(!empty($request->get('comment'))) {
                $comment->text = $request->get('comment');
                $comment->post_id = $id;
                $comment->author()->associate(Auth::user());
                $comment->parent = 1;
                if(request()->hasFile('fileField')) {
                    $comment->file=request()->file('fileField')->getClientOriginalName();
                    request()->file('fileField')->storeAs('files', $comment->file);
                }
                $comment->save();
            }
           return redirect()->route('article::view', $articles->slug);
    }
    public function downloadFiles($filename)
    {
        return  response()->download(storage_path("app/files/$filename"));
    }
}
