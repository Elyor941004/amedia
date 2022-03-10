@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('users.create')}}" class="btn btn-success">Создат заявки</a>
        @if($errors)
            @foreach($errors as $error)
                <div class="alert alert-danger">{{$errors}}</div>
            @endforeach
        @endif
        <br>
        @if(session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
        @endif
        <h2>Ваши заявки</h2>
        <p>можите их изменить и занова отправить</p>
        <table class="table table-bordered">
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
                    <td>{{$model->status}}</td>
                    <td style="display:flex; justify-content: center;"><a href="{{route('users.edit', $model->id)}}" class="btn btn-info">Обновить</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
