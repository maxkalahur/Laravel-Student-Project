@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p align="right">{{$data[0]->updated_at}}</p>
            </div>
            <div class="col-md-12">
                <h2 align="center">{{$data[0]->title}}</h2>
            </div>
            <div class="col-md-12">
                <p>{{$data[0]->text}}</p>
            </div>
            <div class="col-md-8 col-md-offset-2">
                @foreach($comments as $comment)
                   <div class="col-md-4 col-md-offset-2">
                    {{ $comment->name}}
                   </div>
                    <div class="col-md-4 col-md-offset-2">
                        {{ $comment->created_at}}
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                       <p align="left"> {{$comment->text}} </p>
                       <a href="file/{{$comment->file}}" >{{$comment->file}}</a>
                    </div>
                @endforeach
                <form action="{{route("$data->actionComments", $data[0]->id)}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <textarea name="comment" class="form-control"></textarea>
                    <input type="file" name="fileField">
                    <input type="submit" class="btn btn-success" value="send" style="margin-top: 20px">
                </form>
            </div>
        </div>
    </div>
@endsection