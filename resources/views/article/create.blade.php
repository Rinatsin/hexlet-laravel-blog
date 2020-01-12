@extends('layouts.app')

@section('content')
<div>
<a href="/about">About</a>
<a href="{{ route('articles.index') }}">Articles</a>
</div>
<h2>Создать статью</h2>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li><font color="red">{{ $error }}</font></li>
            @endforeach
        </ul>
    </div>
@endif
<div>
    <font color="red" size="3">
        @if (Session::has('status'))
            {{ Session::get('status') }}
        @endif
    </font>
</div>
{{ Form::model($article, ['url' => route('articles.store')]) }}
    {{ Form::label('name', 'Название') }}
    {{ Form::text('name') }}<br>
    {{ Form::label('body', 'Содержание') }}
    {{ Form::textarea('body') }}<br>
    {{ Form::submit('Создать') }}
{{ Form::close() }}

@endsection
