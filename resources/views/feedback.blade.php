@extends('layout.main')

@section('content')
    <div>
        <a href="{{route('feedbackCreate')}}">
            Написать отзыв
        </a>
    </div>
    <hr>
    @foreach($feedback as $feed)
        <div>
            От {{$feed['name']}}
        </div>
        <div>
            {{$feed['theme']}}
        </div>
        <div>
            {{$feed['message']}}
        </div>
        <div>
            {{$feed['created_at']}}
        </div>
        <hr>
    @endforeach
@endsection
