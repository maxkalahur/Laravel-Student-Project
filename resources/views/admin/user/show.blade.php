@extends('admin.dashboard')
@section('main-content')
    <h1 class="text-center text-info">Users</h1>
<div class="row">
    <div class="container-fluid">
        {{--<div class="table-responsive">--}}
            <table class="table table-bordered table-striped table-hover table-condensed">
                <tr class="text-center">
                    <td>id</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Role</td>
                    <td>Created at</td>
                    <td>Updated at</td>
                    <td>Update</td>
                    <td>Delete</td>
                </tr>
        @foreach ($users as $key => $value)
                <tr class='text-center'>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->is_admin ? 'admin' : 'user' }}</td>
                    <td>{{ $value->created_at }}</td>
                    <td>{{ $value->updated_at }}</td>
                    <td>
                            <a href="{{ route('admin::user.edit', $value->id) }}">
                                <button type="button" class="btn btn-default">Update</button>
                            </a>
                    </td>
                    <td>
                        <form action="{{route('admin::user.destroy', $value->id)}}" method="post">
                            <input type="submit" class="btn btn-default" value="Delete">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                        </form>
                    </td>
                <tr>
        @endforeach
    </tr>
    </table>
        {{--</div>--}}
    </div>
        <div class="container-fluid">
            <a href="{{ route('admin::user.create') }}">
                <button type="button" class="btn btn-default">Create user</button>
            </a>
        </div>
</div>

@endsection
