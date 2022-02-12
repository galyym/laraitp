@extends('layout.main')

@section('page-title')
    Статья сайта
@endsection

@section('content')

    <h1>{{$article->title}}</h1>
    <div>
        <p>{!!$article->text!!}</p>
        <p>{{$article->created_at}}</p>
    </div>



    <a href="/article" class="btn btn-warning">Назад</a>
    <a href="/article/{{$article->id}}/edit" class="btn btn-warning">Редактировать</a>
    <br><br>

    {!! Form::open(['action' => ['ArticlesController@destroy', $article->id], 'method' => 'POST']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Удалить запись', ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!}
@endsection

