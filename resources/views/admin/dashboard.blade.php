@extends('admin.layouts.main')

@section('content')
    @section('sidebar')
    <div class="container-fluid">
        <form action="{{route('search')}}" method="GET" role="search">

            <div class="input-group">
                <input type="text" class="form-control" name="search"
                       placeholder="Search info"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
            </div>
        </form>
    <div class="row">
        <div class="col-md-3 col-lg-3" style="background-color: #e8e8e8">
            <ul>
                <li><a href="{{ route('admin::article.index') }}"><h3>
                            {{ trans('admin.articles') }}</h3></a></li>
                <li><a href="{{ route('admin::news.index') }}"><h3>
                            @lang('admin.news')
                        </h3></a></li>
                <li><a href="{{ route('admin::user.index') }}">
                        <h3>
                            @lang('admin.users')
                        </h3></a></li>
                <li><a href="{{ route('admin::comment.index') }}">
                        <h3>@lang('admin.comments')</h3></a></li>
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