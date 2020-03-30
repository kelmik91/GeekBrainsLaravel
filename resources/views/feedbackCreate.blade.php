@extends('layout.main')

@section('content')
    <style>
        label, input, textarea {
            color: #636b6f;
            padding: 5px 25px;
            margin: auto;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('feedbackCreate')}}" method="post" style="display: flex; flex-direction: column; width: 50%; margin: auto">

        @csrf
        <label>
            You Name
            <div>
                <input type="text" name="name" value="{{$model['name'] ?? old('name')}}">
            </div>
        </label>
        <label>
            E-mail
            <div>
                <input type="email" id="" name="email" value="{{$model['email'] ?? old('email')}}">
            </div>
        </label>
        <label>
            Phone
            <div>
                <input type="tel" id="" name="phone" value="{{$model['phone'] ?? old('phone')}}">
            </div>
        </label>
        <label>
            Theme
            <div>
                <input type="text" id="" name="theme" value="{{$model['theme'] ?? old('theme')}}">
            </div>
        </label>
        <label>
            Message
            <div>
                <textarea id="" cols="30" rows="10" name="message">
                    {{$model['message'] ?? old('message')}}
                </textarea>
            </div>
        </label>
        <input type="submit" value="Send" style="width: 100px">
    </form>
@endsection
