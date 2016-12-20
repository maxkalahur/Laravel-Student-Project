<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=User::find(Auth::user()->id)->articles()->orderBy('created_at', 'desc')->get();
        $news=User::find(Auth::user()->id)->news()->orderBy('created_at', 'desc')->get();
        return view('home', [
            'articles'=>$articles,
            'news'=>$news
        ]);
    }
}
