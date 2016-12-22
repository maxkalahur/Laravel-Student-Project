@extends('admin.dashboard')
@section('main-content')
    <h1 class="text-center text-info">New Article</h1>
    <div class="container-fluid table-responsive">
        <form role="form" action="{{ route('admin::user.store') }}" method="post">
            {!! csrf_field() !!}

            <div class="box-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" class="form-control" id="name" required/>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" class="form-control" id="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" name="password" id="password"  required>
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