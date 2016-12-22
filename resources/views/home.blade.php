@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-0">
                <a href="{{route('home::news.create')}}" class="btn btn-success btn-group btn-block">
                    Create new news
                </a>
            </div>
        <div class="col-md-5 col-md-offset-2">
            <a href="{{route('home::articles.create')}}" class="btn btn-success btn-group btn-block">
                   Create new article
            </a>
        </div>
    </div>
</div>
<div class="container">
            <div class="row col-md-12">
                <div class="col-md-12">
                   <h1 align="center">Your records</h1>
                </div>
            </div>
            <table class="table tab-content table-hover">
                  @foreach($data as $obj)
                      <tr><td><p></p></td></tr>
                      <tr><td>
                        <div class="row">
                           <div class="col-md-11">
                               <p align="center">{{$obj->title}}</p>
                           </div>
                           <div class="col-md-1"><form action="{{
                                  $obj->table_name=='news' ? route('home::news.destroy', $obj->id)
                                  : route('home::articles.destroy', $obj->id)}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input name="_token" type="hidden" value="{{csrf_token()}}">
                            <input type="submit" class="btn btn-danger" value="delete">
                        </form></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                             <p class="lead">{{$obj->text}}</p>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-12">
                            <p align="right"style="color: lightslategray">Last update this {{$obj->table_name}}: {{$obj->updated_at}}
                            <a href="{{
                             $obj->table_name=='news' ? route('home::news.edit', $obj->id) :
                            route('home::articles.edit', $obj->id)}}" class="btn btn-success">update</a></p>
                                </div>
                            </div>
                      </td></tr>
                  @endforeach
            </table>
</div>
        <div class="col-md-5 col-md-offset-5">
           {{$data->links()}}
        </div>
@endsection
