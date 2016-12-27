<?php

namespace App\Http\Controllers;

use App\FileEntry;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class FileEntryController extends Controller
{
    public function addArticleFiles(Request $request)
    {
        //$file=request()->file('fileField')->store('files');
        //$filename=request()->file('fileField')->getFilename();
        $filename=request()->file('fileField')->getClientOriginalName();
        dump($filename);
       // return back();
    }
    public function getArticleFiles()
    {

    }
    public function addNewsFiles()
    {

    }
    public function getNewsFiles()
    {

    }
}
