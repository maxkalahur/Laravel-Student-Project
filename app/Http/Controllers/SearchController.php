<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        $query = $request->get('search');

        $news = DB::table('news')
            ->select(DB::raw('id,title, text, created_at, updated_at, \'news\' as table_name'))
            ->where('title', 'LIKE', '%' . $query . '%');
        $data =DB::table('articles')
            ->select(DB::raw('id,title, text, created_at, updated_at, \'articles\' as table_name'))
            ->where('title', 'LIKE', '%' . $query . '%')
            ->unionAll($news)
            ->orderBy('updated_at','desc')
            ->get();
        return view('search', compact('data'));
    }
}
