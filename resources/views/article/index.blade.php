@extends('layouts.app')

@section('content')
    <h1>Список статей</h1>
    <a href=" {{ route('articles.create') }} ">[Create new article]</a>
    <div>
        <font color="red" size="3">
            @if (Session::has('status'))
                {{ Session::get('status') }}
            @endif
        </font>
    </div>
    @foreach ($articles as $article)
        <p>
        <h2><a href="{{ route('articles.show', [$article->id]) }}">{{$article->name}}</a></h2>
        [<a href="{{ route('articles.edit', [$article->id]) }} ">edit</a>]
        [<a href="{{ route('articles.destroy', [$article->id]) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">delete</a>]
        </p>
        {{-- Str::limit – функция-хелпер, которая обрезает текст до указанной длины --}}
        {{-- Используется для очень длинных текстов, которые нужно сократить --}}
        <div>{{Str::limit($article->body, 200)}}</div>
    @endforeach
@endsection

@section('pageLinks')
{{ $articles->links() }}
@endsection
