<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    public function index()
    {
        $page=Input::get('page', 1);
        $paginate=4;
         $members=DB::table('news')
             ->select(DB::raw('id,title, text, created_at, updated_at, slug, \'news\' as table_name'));
        $data=DB::table('articles')
            ->select(DB::raw('id,title, text, created_at, updated_at, slug,\'articles\' as table_name'))
            ->unionAll($members)
            ->get();
        $offset=($page*$paginate)-$paginate;
        $itemsForCurrentPage = array_slice($data->toArray(), $offset, $paginate, true);
        $data=new LengthAwarePaginator($itemsForCurrentPage, count($data), $paginate, $page, ['path'=>'/']);
        return view('home', [
            'data'=>$data
        ]);
    }
}
