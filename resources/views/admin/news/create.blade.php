@extends('admin.dashboard')
@section('main-content')
    <h1 class="text-center text-info">New News</h1>
    <div class="container-fluid table-responsive">
        <form role="form" action="{{ route('admin::news.store') }}" method="post">
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