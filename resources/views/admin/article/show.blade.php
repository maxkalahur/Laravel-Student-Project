@extends('admin.layouts.main')
@section('content')

        <div class="container table-responsive">
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


        @foreach ($articles as $key => $value)
                <tr class='text-center'>
                <td>{{ $value->id }}</td>
                <td>{{ $value->title }}</td>
                <td>{{ $value->text }}</td>
                <td>{{ $value->user->name ? $value->user->name : "do not" }}</td>
                <td></td>
                <td>{{ $value->created_at }}</td>
                <td>{{ $value->updated_at }}</td>
                <td>V</td>
                <td>

                    <form action="{{route('admin::article.destroy', $value->id)}}" method="post">

                        <input type="submit" value="Delete">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                    </form>
                </td>
                <tr>

        @endforeach
    </tr>
    </table>
    </div>
        <div class="container">
            <button type="button" class="btn btn-default">
                <a href="{{ route('admin::article.create') }}">Create Article</a>
            </button>

        </div>

@endsection
