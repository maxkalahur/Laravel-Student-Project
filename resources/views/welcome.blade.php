@extends('layouts.app')
@section('content')

      <div class="container">
          <div class="row">
          <div class="col-md-2">
              @foreach($news as $new)
                  <div class="row">
                      <h2>{{$new->title}}</h2>
                      <p>{{$new->text}}</p>
                  </div>
              @endforeach
          </div>
          <div class="col-md-10">
          @foreach($articles as $article)
              <div class="row">
            <h2>{{$article->title}}</h2>
              <p>{{$article->text}}</p>
              </div>
          @endforeach
              <div class="col-md-5 col-md-offset-5">{{$articles->links()}}</div>
          </div>
      </div>
      </div>
@endsection

