@extends('layout.main')

@section('content')
    @forelse ($user as $item)
        <div class="row justify-content-center">
            <div class="col-md-6 border ">
                <h2>{{$item->name}}</h2>
                <a class="btn btn-success" href="{{route('admin::users::update', ['id' => $item->id])}}">
                    Изменить
                </a>
                <a class="btn btn-danger" href="{{route('admin::users::delete', ['id' => $item->id])}}">
                    Удалить
                </a>
            </div>
        </div>
    @empty
        Пользователей нет!
    @endforelse
    {{$user->links()}}
@endsection


