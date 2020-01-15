@extends('layouts.app')

@section('content')
<div>
<a href="/about">About</a>
<a href="{{ route('articles.index') }}">Articles</a>
</div>
<h2>Обновить статью</h2>
{{ Form::model($article, ['url' => route('articles.update', $article), 'method' => 'PATCH']) }}
    @include('article.form')
    {{ Form::submit('Обновить') }}
{{ Form::close() }}

@endsection
