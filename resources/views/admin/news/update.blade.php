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
            <form action="{{route('admin::news::update')}}" method="post">
                @csrf
                <label for="">Id</label>
                <div class="form-group">
                    <input disabled class="form-control" type="text" name="id" value="{{$value['id']}}">
                </div>
                <label for="">Title</label>
                <div class="form-group">
                    <input class="form-control" type="text" name="title" value="{{$value['title']}}">
                </div>
                <label for="">Description</label>
                <div class="form-group">
                    <textarea class="form-control" name="content" id="" cols="30" rows="10">{{$value['content']}}</textarea>
                </div>
                <label for="">Category</label>
                <div class="form-group">
                    <select class="form-control" name="category_id" id="">
                        @foreach($categories as $value)
                            <option value="{{$value['id']}}"
                                @if($value['id'] == old('category_id'))
                                    selected
                                @endif
                            >
                                {{$value['name']}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input class="form-control" type="date" dataformatas="Y-m-d" name="publish_date">
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="Send">
                </div>
            </form>
        </div>
    </div>
@endsection
