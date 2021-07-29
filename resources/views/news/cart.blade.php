@extends('layout.main')

@section('content')
    <br>
    <p>
        Страница новостей {{$category_name['name']}}
    </p>
    <p>
        {!!$news['content']!!}
    </p>
@endsection
