@extends('admin.dashboard')
@section('main-content')
    <h1 class="text-center text-info">Update Article</h1>
    <div class="container-fluid table-responsive">
        <form role="form" action="{{ route('admin::user.update', $user->id) }}" method="post">
            {{ method_field('PUT') }}
            {!! csrf_field() !!}

            <div class="box-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" class="form-control" id="name" required
                           value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" class="form-control" id="email" required
                        value="{{$user->email}}">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" name="password" id="password"  required
                           value="{{$user->password}}">
                </div>
                <div class="form-group">
                    <label for="inputText">Role</label>
                    <select class="form-control" name="is_admin">
                        <option value='1' {{$user->is_admin? 'selected': ''}}> Admin </option>
                        <option value='0' {{$user->is_admin? '': 'selected'}}> User </option>
                    </select>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection