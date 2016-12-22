@extends('admin.dashboard')
@section('main-content')
    <h1 class="text-center text-info">Comments</h1>
<div class="row">
    <div class="container-fluid">
        {{--<div class="table-responsive">--}}
            <table class="table table-bordered table-striped table-hover table-condensed">
                <tr class="text-center">
                    <td>id</td>
                    <td>text</td>
                    <td>Author</td>
                    <td>Post</td>
                    <td>parent</td>
                    <td>Created at</td>
                    <td>Updated at</td>
                    <td>Update</td>
                    <td>Delete</td>
                </tr>
        @foreach ($comment as $key => $value)
                <tr class='text-center'>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->text }}</td>
                    <td> {{ $value->author_id }}</td>
                    <td>{{ $value->post_id  }}</td>
                    <td>{{ $value->parent }}</td>
                    <td>{{ $value->created_at }}</td>
                    <td>{{ $value->updated_at }}</td>
                    <td>
                            <a href="{{ route('admin::comment.edit', $value->id) }}">
                                <button type="button" class="btn btn-default">Update</button>
                            </a>
                    </td>
                    <td>
                        <form action="{{route('admin::comment.destroy', $value->id)}}" method="post">
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
            <a href="{{ route('admin::comment.create') }}">
                <button type="button" class="btn btn-default">Create comment</button>
            </a>
        </div>
</div>

@endsection
