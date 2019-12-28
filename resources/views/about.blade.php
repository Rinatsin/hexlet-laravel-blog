<?php ?>
@extends('layouts.app')

@section('title', 'O блоге')

@section('header')
<p>Эксперименты с Laravel на Хекслете</p>
@endsection

@section('content')
<p><b>Our team</b></p>
@foreach ($team as $member)
    <p> Name: {{$member['name']}} </p>
    <p> Position: {{$member['position']}} </p>
    </br>
@endforeach
@endsection
