@extends('layouts.app')

@section('content')
<div>
<a href="/about">About</a>
<a href="{{ route('articles.index') }}">Articles</a>
</div>
<h2>Создать статью</h2>
{{ Form::model($article, ['url' => route('articles.store')]) }}
    @include('article.form')
    {{ Form::submit('Создать') }}
{{ Form::close() }}

@endsection
