@extends('layout.main')

@section('content')
@foreach ($newsCategory as $key => $value)
<div>
    <a href="{{route('newsCategory', ['id' => $value['title']])}}">
        {{$value['title']}}
    </a>
</div>
@endforeach
@endsection
