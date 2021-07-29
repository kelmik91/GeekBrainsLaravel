@extends('layout.main')

@section('content')
    @foreach ($newsCategory as $key => $value)
<div>
    <a href="{{route('newsCategory', ['id' => $value['id']])}}">
        {{$value['name']}}
    </a>
</div>
@endforeach
@endsection
