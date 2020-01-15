@extends('layouts.app')

@section('content')
<div>
    <a href="/about">About</a>
    <a href="{{ route('articles.index') }}">Articles</a>
</div>
<h1>{{$article->name}}</h1>
    <p>
        <a href="{{ route('articles.edit', [$article->id]) }} ">[edit]</a>
    </p>
<div>{{$article->body}}</div>
@endsection
