@extends('examples.layout')
@section('title')
Curso Laravel de Luis Ovando
@stop
@section('content')
    <h1>Curso básico de Laravel 5</h1>
    <p>
        Bienvenido {{$user}}
    </p>
@stop
@section('footer')
    <h5>Desarrollado por: {{$developer}}</h5>
@stop
