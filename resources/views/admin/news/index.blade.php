@extends('layout.main')

@section('content')
    <a class="btn btn-success" href="{{route('admin::news::create')}}">
        Создать
    </a>
    @forelse ($news as $item)
        <div class="row justify-content-center">
            <div class="col-md-6 border ">
                <h2>{{$item->title}}</h2>
                <a class="btn btn-success" href="{{route('admin::news::update', ['id' => $item->id])}}">
                    Изменить
                </a>
                <a class="btn btn-danger" href="{{route('admin::news::delete', ['id' => $item->id])}}">
                    Удалить
                </a>
            </div>
        </div>
    @empty
        Новостей в нет!
    @endforelse
    {{$news->links()}}
@endsection


