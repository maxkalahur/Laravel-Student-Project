<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
//        $user = User::find(1);

        $user = User::all();
        $id = (Auth::user()->id);
        $check = User::find((Auth::user()->id))->is_admin;
        return view('admin.users.index', compact('user','check', 'id'));
    }
}
