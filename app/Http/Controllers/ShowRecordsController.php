<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Articles;
use App\News;

class ShowRecordsController extends Controller
{
    public function showNew($id)
    {
        $record=News::find($id);
        $record->action="/new";
        $comments=Comment::find($id);
        return view('showRecord', [
            'data'=>$record,
            'comments'=>$comments
        ]);
    }
    public function showArticle($id)
    {
        $record=Articles::find($id);
        $record->action='comment';
        $comments=Comment::find($id);
        return view('showRecord', [
            'data'=>$record,
            'comments'=>$comments
        ]);
    }
}
