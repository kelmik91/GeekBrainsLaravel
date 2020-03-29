@extends('layout.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{route('admin::news::create')}}" method="post">
                @csrf
                <label for="">Title</label>
                <div class="form-group">
                    <input class="form-control" type="text" name="title">
                </div>
                <label for="">Description</label>
                <div class="form-group">
                    <textarea class="form-control" name="content" id="" cols="30" rows="10"></textarea>
                </div>
                <label for="">Category</label>
                <div class="form-group">
                    <select class="form-control" name="category_id" id="">
                        @foreach($categories as $value)
                            <option value="{{$value['id']}}">{{$value['name']}}</option>
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
