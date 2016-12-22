@extends('layouts.app')
@section('content')

      <div class="container">
          <div class="row">
          <div class="col-md-2">
              @foreach($data as $obj)
                  @if($obj->table_name=="news")
                  <div class="row">
                      <h2><a href="new/{{$obj->id}}">{{$obj->title}}</a></h2>
                      <p>{{$obj->text}}</p>
                  </div>
                  @endif
              @endforeach
          </div>
          <div class="col-md-10">
          @foreach($data as $obj)
              @if($obj->table_name=="articles")
              <div class="row">
                 <h2><a href="article/{{$obj->id}}">{{$obj->title}}</a></h2>
                 <p>{{$obj->text}}</p>
              </div>
                  @endif
          @endforeach
          </div>
              <div class="col-md-7 col-md-offset-5">{{$data->links()}}</div>
      </div>
      </div>
@endsection

