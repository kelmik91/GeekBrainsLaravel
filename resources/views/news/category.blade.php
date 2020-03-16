@extends('layout.main')

@section('content')
    <div>Новости раздела {{$id}}
    </div>
    @foreach ($news as $key => $value)

        <div>
            <a href="{{route('newsCard', ['category' => $id, 'id' => $key])}}">
                {{$value['title']}}
            </a>
        </div>
    @endforeach
@endsection
