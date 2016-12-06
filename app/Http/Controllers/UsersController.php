<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $array = ['one' => 'fasdf', 'two' => 'some else'];
        return view('admin.users.index', compact('array'));
    }
}
