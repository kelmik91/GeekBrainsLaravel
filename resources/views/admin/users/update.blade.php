@extends('layout.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('admin::users::update')}}" method="post">
                @csrf
                <label for="">Id</label>
                <div class="form-group">
                    <input readonly class="form-control" type="text" name="id" value="{{$value['id']}}">
                </div>
                <label for="">Name</label>
                <div class="form-group">
                    <input class="form-control" type="text" name="name" value="{{$value['name']}}">
                </div>
                <label for="">E-mail</label>
                <div class="form-group">
                    <input class="form-control" type="text" name="email" value="{{$value['email']}}">
                </div>
                <label for="">User</label>
                <div class="form-group">
                    <input checked class="form-control" type="radio" name="role" value="1">
                </div>
                <label for="">Author</label>
                <div class="form-group">
                    <input class="form-control" type="radio" name="role" value="2">
                </div>
                <label for="">Admin</label>
                <div class="form-group">
                    <input class="form-control" type="radio" name="role" value="3">
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="Send">
                </div>
            </form>
        </div>
    </div>
@endsection
