@extends('layouts.app')
@section('content')

    <div class="container">
        <a href="{{route('users.index')}}"  class="btn btn-info">Редактироват заявки</a> <br>
        @if($errors->any())
           @foreach($errors->all() as $error)
               <div class="alert alert-danger">{{ $error }}</div>
           @endforeach
        @endif
        <br>
        @if(session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
        @endif
        <br>
        <h2>Форму заявок</h2>
        <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="theme">Тема:</label>
                <input type="text" class="form-control" id="theme" placeholder="Enter theme" name="theme">
            </div>
            <div class="form-group">
                <label for="theme">Сообщение:</label>
                <input type="text" class="form-control" id="message" placeholder="Enter message" name="message">
            </div>
            <div class="form-group">
                <label for="theme">Имя клиента:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>
            <div class="form-group">
                <label for="theme">Почта клиента:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label for="file">Прикреит файл:</label>
                <input type="file" class="form-control" id="file" name="file">
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
@endsection
