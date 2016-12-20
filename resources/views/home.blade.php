@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-0">
                <a href="{{route('home::news.create')}}" class="btn btn-danger btn-group btn-block">
                    Create new news
                </a>
            </div>
        <div class="col-md-5 col-md-offset-2">
            <a href="{{route('home::articles.create')}}" class="btn btn-danger btn-group btn-block">
                   Create new article
            </a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <h2 align="center">Your news</h2>
            </div>
            <table class="table tab-content table-bordered">
                @if(is_object($news))
            @foreach($news as $new)
                    <tr><th><p align="center">{{$new->title}}</p></th></tr>
                    <tr><td><p class="lead">{{$new->text}}</p></td></tr>
                    <tr><td>
                            <p align="right"style="color: lightslategray">Last update: {{$new->updated_at}}</p>
                            <form action="{{route('home::news.destroy', $new->id)}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input name="_token" type="hidden" value="{{csrf_token()}}">
                                <input type="submit" class="btn btn-danger" value="delete">
                            </form>
                            <a href="{{route('home::news.edit', $new->id)}}" class="btn btn-success">update</a>
                        </td></tr>
            @endforeach
                    @endif
            </table>
        </div>
    <div class="col-md-6">
        <div class="row">
            <h2 align="center">Your article</h2>
        </div>
        <table class="table tab-content table-bordered">
            @if (is_object($articles))
        @foreach($articles as $article)
                <tr><th><p align="center">{{$article->title}}</p></th></tr>
                <tr><td><p class="lead">{{$article->text}}</p></td></tr>
                <tr><td>
                        <p align="right"style="color: lightslategray">Last update: {{$article->updated_at}}</p>
                        <form action="{{route('home::articles.destroy', $article->id)}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input name="_token" type="hidden" value="{{csrf_token()}}">
                            <input type="submit" class="btn btn-danger" value="delete">
                        </form>
                        <a href="{{route('home::articles.edit', $article->id)}}" class="btn btn-success">update</a>
                    </td></tr>
        @endforeach
                @endif
        </table>
    </div>
</div>
</div>
@endsection
