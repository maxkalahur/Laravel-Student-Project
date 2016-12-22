@extends('admin.dashboard')
@section('main-content')
    <h1 class="text-center text-info">New Comment</h1>
    <div class="container-fluid table-responsive">
        <form role="form" action="{{ route('admin::comment.store') }}" method="post">
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
                    <label for="inputText">Role</label>
                        <select class="form-control" name="is_admin">
                            <option value="0" selected>User</option>
                            <option value="1">Admin</option>
                        </select>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection