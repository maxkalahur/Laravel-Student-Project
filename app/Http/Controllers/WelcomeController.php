<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\News;

class WelcomeController extends Controller
{
    public function index()
    {
        $articles=Article::paginate(4);
        $news=News::all();
        return view('welcome', [
            'articles'=>$articles,
            'news'=>$news
        ]);
    }
}
