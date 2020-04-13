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
            <form action="{{route('admin::news::create')}}" method="post">
                @csrf
                <label for="">Title</label>
                <div class="form-group">
                    <input class="form-control" type="text" name="title" value="{{$model['title'] ?? old('title')}}">
                </div>
                <label for="">Description</label>
                <div class="form-group" style="width: 50%;">
                    <textarea
                        class="form-control"
                        name="content"
                        id="description"
                        cols="30" rows="10">
                        {{$model['content'] ?? old('content')}}
                    </textarea>
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
                    <input class="form-control" type="date" dataformatas="Y-m-d" name="publish_date" value="{{$model['publish_date'] ?? old('publish_date')}}">
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="Send">
                </div>
            </form>
        </div>
    </div>



{{--    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>--}}
    <script src="/vendor/ckeditor/ckeditor/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: 'laravel-filemanager?type=Files',
            filebrowserUploadUrl: 'laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        };
    </script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
