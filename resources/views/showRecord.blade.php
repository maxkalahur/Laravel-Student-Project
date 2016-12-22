@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p align="right">{{$data->updated_at}}</p>
            </div>
            <div class="col-md-12">
                <h2 align="center">{{$data->title}}</h2>
            </div>
            <div class="col-md-12">
                <p>{{$data->text}}</p>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <form action="{{url('/article', $data->id)}}" method="post">
                    <textarea name="comment" class="form-control"></textarea>
                    <input type="submit" class="btn btn-success" value="send" style="margin-top: 20px">
                </form>
            </div>
        </div>
    </div>
@endsection