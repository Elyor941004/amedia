@extends('layouts.app')
@section('content')

    <div class="container">
        <a href="{{route('users.index')}}"  class="btn btn-info">Редактироват заявки</a><br>
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
        <h2>Обновить форму заявок</h2>
        <form action="{{route('users.update', $models->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="theme">Тема:</label>
                <input type="text" class="form-control" id="theme"  name="theme" value="{{$models->theme}}">
            </div>
            <div class="form-group">
                <label for="theme">Сообщение:</label>
                <input type="text" class="form-control" id="message"  name="message" value="{{$models->message}}">
            </div>
            <div class="form-group">
                <label for="theme">Имя клиента:</label>
                <input type="text" class="form-control" id="name"  name="name" value="{{$models->name}}">
            </div>
            <div class="form-group">
                <label for="theme">Почта клиента:</label>
                <input type="email" class="form-control" id="email"  name="email" value="{{$models->email}}">
            </div>
            <div class="form-group">
                <label for="file">Прикрепит файл:</label>
                <input type="file" class="form-control" id="file" name="file">
            </div>
            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>
@endsection
