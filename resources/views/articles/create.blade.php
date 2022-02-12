@extends('layout.main')

@section('page-title')
    Создание новый статьи
@endsection

@section('content')
    <h1>Создание новый статьи</h1>

    {!! Form::open(['action' => 'ArticlesController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Название статьи')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Введите заголовок'])}}
        </div><div class="form-group">
            {{Form::label('text', 'Сама статья')}}
            {{Form::textarea('text', '', ['id' => 'app-ckeditor', 'placeholder' => 'Введите статью'])}}
        </div>

        {{Form::submit('Добавить', ['class' => 'btn btn-success'])}}
    {!! Form::close() !!}
@endsection
