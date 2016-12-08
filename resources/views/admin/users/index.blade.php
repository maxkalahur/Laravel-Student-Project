<h1>
    {{dump($check)}}
    {{dump($id)}}
@foreach($user as $users)
    {!!$users->is_admin!!}
@endforeach
</h1>
