@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('users.index')}}"  class="btn btn-info">Смотрет остальние заявки</a> <br>
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
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$model->theme}}</td>
                    <td>{{$model->message}}</td>
                    <td>{{$model->name}}</td>
                    <td>{{$model->email}}</td>
                    <td><img src="{{asset("public/storage/".$model->file)}}" alt="" width="140px"></td>
                    <td style="background-color: green"><b style="color: white" >отмечено</b></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
