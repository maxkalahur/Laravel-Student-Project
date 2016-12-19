@extends('admin.layouts.main')
@section('content')

    <div class="container table-responsive">
        <form role="form" action="{{ route('admin::article.store') }}" method="post">
            {!! csrf_field() !!}

            <div class="box-body">
                <div class="form-group">
                    <label for="inputTitle">Title</label>
                    <input name="title" required class="form-control" id="inputTitle" placeholder="Enter title"  />
                </div>
                <div class="form-group">
                    <label for="inputDescription">Text</label>
                    <textarea name="text" required class="form-control" id="inputDescription"
                              placeholder="Enter description"></textarea>
                </div>

                <div class="form-group">
                    <label for="inputText">Author name</label>
                    <select class="form-control" name="user_id">
                        @foreach($users as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection