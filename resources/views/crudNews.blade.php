@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>{{$header}}</h1>
                @if(isset($new))
                    <form action="{{route('news.update', $new->id)}}" method="post">
                        <input type="hidden" name="_method" value="put">
                        @else
                            <form action="{{route('news.store')}}" method="post">
                                @endif
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <label>Title:</label>
                                <input type="text" name="title" class="form-control"
                                       value="{{$title=isset($new->title) ? $new->title : ""}}">
                                <label>Content:</label>
                                <textarea name="text" class="form-control" cols="50" rows="10">
                        {{$text=isset($new->text) ? $new->text : ""}}</textarea>
                                <input type="submit" value="Save"
                                       class="btn btn-success btn-lg btn-block" style="margin-top: 20px">
                            </form>
            </div>
        </div>
    </div>
@endsection