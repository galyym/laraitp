@extends('layout.main')

@section('page-title')
    Все статьи сайта
@endsection

@section('content')
    <h1>Все статьи сайта</h1>

    @if(count($articles)>0)
        @foreach($articles as $el)
            <div class="well">
                <a href="/article/{{$el->id}}"><h3>{{$el->title}}</h3></a>
                <p>Последнее обновление: {{$el->updated_at}}</p>
            </div>
        @endforeach
    @else
        <p>На данные момент нет статей</p>
    @endif
@endsection
