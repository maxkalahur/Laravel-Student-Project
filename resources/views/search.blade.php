@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container-fluid">
            <table class="table table-responsive table-hover table-bordered">
                <tr class="text-center">
                    <td>Name</td>
                    <td>Type</td>
                    <td>Date</td>
                </tr>
                @foreach ($data as $key => $value)
                    <tr>
                        <td><a class="text-info" href="{{url('/article', $value->id)}}" style="color: #78341a;">
                                {{$value->title}}</a></td>
                        <td>{{$value->table_name}}</td>
                        <td>{{ $value->updated_at }}</td>
                    <tr>
                        @endforeach
                    </tr>
            </table>
        </div>
@endsection