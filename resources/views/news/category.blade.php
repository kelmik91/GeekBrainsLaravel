@extends('layout.main')

@section('content')
    <style>
        ul {
            display: flex;
        }
        ul > li {
            margin: 5px;
            padding: 5px;
            border: black 1px solid;
            display: block;
        }
    </style>

    <div>Новости раздела {{$category['name']}}
    </div>
    @forelse ($news as $key => $value)

        <div>
            <a href="{{route('newsCard', ['category' => $category['id'], 'id' => $value['id']])}}">
                {{$value['title']}}
            </a>
        </div>
        @empty
        <div>News empty!</div>
    @endforelse
        {{$news->links()}}
@endsection
