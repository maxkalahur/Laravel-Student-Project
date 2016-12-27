<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AccountController extends Controller
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
        $page=Input::get('page', 1);
        $paginate=4;
        $members=DB::table('news')
            ->select(DB::raw('id,title, text, created_at, updated_at, \'news\' as table_name'))
            ->where('user_id', Auth::user()->id);
        $data=DB::table('articles')
            ->select(DB::raw('id,title, text, created_at, updated_at, \'articles\' as table_name'))
            ->where('user_id', Auth::user()->id)
            ->unionAll($members)
            ->orderBy('updated_at','desc')
            ->get();

        $offset=($page*$paginate)-$paginate;
        $itemsForCurrentPage = array_slice($data->toArray(), $offset, $paginate, true);
        $data=new LengthAwarePaginator($itemsForCurrentPage, count($data), $paginate, $page, ['path'=>'/account']);

        return view('account', [
          'data'=>$data
        ]);
    }
}
