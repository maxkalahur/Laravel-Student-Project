@extends('admin.layouts.main')

@section('content')
    @section('sidebar')
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-lg-3" style="background-color: #e8e8e8">
            <ul>
                <li><a href="{{ route('admin::article.index') }}"><h3>Articles</h3></a></li>
                <li><a href="{{ route('admin::news.index') }}"><h3>News</h3></a></li>
                <li><a href="{{ route('admin::user.index') }}"><h3>Users</h3></a></li>
                <li><a href="{{ route('admin::comment.index') }}"><h3>Comments</h3></a></li>
            </ul>

        </div>
        <div class="col-md-9 col-lg-9">
                @section('main-content')
                    <h1>Main section</h1>
                @show
            </div>
    </div>
    </div>
    @show

@endsection