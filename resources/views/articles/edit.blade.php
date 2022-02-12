@extends('layout.main')

@section('page-title')
    Обновление статьи
@endsection

@section('content')
    <h1>Обновление статьи</h1>

    {!! Form::open(['action' => ['ArticlesController@update', $article->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('title', 'Название статьи')}}
        {{Form::text('title', $article->title, ['class' => 'form-control', 'placeholder' => 'Введите заголовок'])}}
    </div><div class="form-group">
        {{Form::label('text', 'Сама статья')}}
        {{Form::textarea('text', $article->text, ['id' => 'app-ckeditor', 'placeholder' => 'Введите статью'])}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Обновить', ['class' => 'btn btn-success'])}}
    {!! Form::close() !!}
@endsection
