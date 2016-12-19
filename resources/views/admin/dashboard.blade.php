@extends('admin.layouts.main')

@section('content')
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-3" style="background-color: #777777">
            <ul>
                <li><a href="{{ route('admin::article.index') }}"><h3>Article</h3></a></li>
                <li><a href="{{ route('admin::news.index') }}"><h3>News</h3></a></li>
            </ul>

        </div>
        <div class="col-md-9" style="background-color: #000">

        </div>
    </div>
    </div>
@endsection