@extends('examples.layout')
@section('title')
Curso Laravel de Luis Ovando
@stop
@section('content')
    <h1>Curso básico de Laravel 5</h1>
    <p>
        @if(isset($user))
            Bienvenido {{$user}}
        @else
            [Login]
        @endif
    </p>
@stop
