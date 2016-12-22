@extends('admin.dashboard')

@section('main-content')
    <h1 class="text-center text-info">News</h1>

<div class="row">
        <div class="container-fluid">
            <table class="table table-bordered table-striped table-hover table-condensed">
                <tr class="text-center">
                    <td>id</td>
                    <td>Title</td>
                    <td>Text</td>
                    <td>User id</td>
                    <td>Category id</td>
                    <td>Created at</td>
                    <td>Updated at</td>
                    <td>Update</td>
                    <td>Delete</td>

                </tr>


        @foreach ($news as $key => $value)
                <tr class='text-center'>
                <td>{{ $value->id }}</td>
                <td>{{ $value->title }}</td>
                <td>{{ $value->text }}</td>
                <td>{{ $value->user->name ? $value->user->name : "no info" }}</td>
                <td></td>
                <td>{{ $value->created_at }}</td>
                <td>{{ $value->updated_at }}</td>
                <td>

                        <a href="{{ route('admin::news.edit', $value->id) }}">
                            <button type="button" class="btn btn-default">Update</button>
                        </a>

                    {{--<form action="{{route('admin::article.update', $value->id)}}" method="post">--}}

                        {{--<input type="submit" value="Update">--}}
                        {{--{{ method_field('PUT') }}--}}
                        {{--{{ csrf_field() }}--}}
                    {{--</form>--}}
                </td>
                <td>

                    <form action="{{route('admin::news.destroy', $value->id)}}" method="post">

                        <input type="submit" class="btn btn-default" value="Delete">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                    </form>
                </td>
                <tr>

        @endforeach
    </tr>
    </table>
    </div>
        <div class="container-fluid">
            <a href="{{ route('admin::news.create') }}">
                <button type="button" class="btn btn-default">Create Article</button>
            </a>

        </div>
</div>
@endsection
