@extends('layouts.app')
@section('content')
    <div class="container">
        @if($errors)
            @foreach($errors as $error)
                <div class="alert alert-danger">{{$errors}}</div>
            @endforeach
        @endif
        <br>
        @if(session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
        @endif
        <h2> Заявки Клиенты</h2>
        <table class="table table-dark">
            <thead>
            <tr>
                <th>Тема</th>
                <th>Сообщение</th>
                <th>Имя клиента</th>
                <th>Почта клиента</th>
                <th>Файл</th>
                <th>Статус</th>
                <th>Редактироват</th>
            </tr>
            </thead>
            <tbody>
            @foreach($models as $model)
                <tr>
                    <td>{{$model->theme}}</td>
                    <td>{{$model->message}}</td>
                    <td>{{$model->name}}</td>
                    <td>{{$model->email}}</td>
                    <td><img src="{{asset("public/storage/".$model->file)}}" alt="" width="140px"></td>
                    @if($model->status == 1)
                        <td style="background-color: green"><b style="color: white">Отмечено</b></td>
                    @else
                        <td><b>{{$model->status}}</b></td>
                    @endif
                    <td style="display:flex; justify-content: center;"><a href="{{route('admin.show', $model->id)}}" class="btn btn-success">Смотрет подробнее</a>&nbsp;&nbsp; <a href="{{route('users.destroy', $model->id)}}" class="btn btn-danger">Удалить</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
