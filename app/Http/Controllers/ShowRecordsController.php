<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Article;
use App\News;

class ShowRecordsController extends Controller
{
    public function showNews($slug)
    {
        $record=News::where('slug', $slug)->get();
        $record->actionComments='news::Comment';
        $record->actionFiles='news::File';
        $comments=$this->getComments($record[0]->id, 0);
        return view('showRecord', [
            'data'=>$record,
            'comments'=>$comments
        ]);
    }
    public function showArticle($slug)
    {
        $record=Article::where('slug', $slug)->get();
        $record->actionComments='article::Comment';
        $record->actionFiles='article::File';
        $comments=$this->getComments($record[0]->id, 1);
        return view('showRecord', [
            'data'=>$record,
            'comments'=>$comments
        ]);
    }

    public function getComments($id, $parent)
    {
        $comments = Comment::where([
            ['parent', $parent],
            ['post_id', $id]
        ])->orderBy('updated_at', 'desc')->get();
        return $comments;
    }
}

