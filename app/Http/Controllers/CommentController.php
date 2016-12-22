<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function newComment(Request $request, $id)
    {
        dump($id);
    }
    public function articleComment(Request $request, $id)
    {
       dump($id);
    }
}
