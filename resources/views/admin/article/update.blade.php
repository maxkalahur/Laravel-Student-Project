@extends('admin.dashboard')
@section('main-content')
    <h1 class="text-center text-info">Update Article</h1>
    <div class="container-fluid table-responsive">
        <form role="form" action="{{ route('admin::article.update', $article->id) }}" method="post">
            {{ method_field('PUT') }}
            {!! csrf_field() !!}

            <div class="box-body">
                <div class="form-group">
                    <label for="inputTitle">Title</label>
                    <input name="title" required class="form-control" id="inputTitle" placeholder="Enter title" value="{{ $article->title }}" />
                </div>
                <div class="form-group">
                    <label for="inputDescription">Text</label>
                    <textarea name="text" required class="form-control" id="inputDescription"
                              placeholder="Enter description">{{ $article->text }}</textarea>
                </div>

                <div class="form-group">
                    <label for="inputText">Author name</label>
                    <select class="form-control" name="user_id">
                        @foreach($users as $value)
                            @if( $value->id == $article->user_id)
                                <option value="{{$value->id}}" selected > {{$value->name}} </option>
                            @else
                                <option value="{{$value->id}}"> {{$value->name}} </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection