@extends('admin.dashboard')
@section('main-content')
    <h1 class="text-center text-info">Update Article</h1>
    <div class="container-fluid table-responsive">
        <form role="form" action="{{ route('admin::comment.update', $user->id) }}" method="post">
            {{ method_field('PUT') }}
            {!! csrf_field() !!}

            <div class="box-body">
                <div class="form-group">
                    <label for="text">Text</label>
                    <textarea name="text" class="form-control" id="text" required>

                    </textarea>
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <select class="form-control" name="author" id="author">
                        <option value="0" selected>User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="post">Post</label>
                    <select class="form-control" name="author" id="author">
                        <option value="0" selected>User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="parent">Parent</label>
                    <input name="parent" class="form-control" id="parent" required>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection