@extends('app')
@section('content')
    <div class="container">
        <h1>Imprimiendo Usuarios</h1>
            @foreach($users as $user)
                <p>Id: {{$user->id}}</p>
                <p>Nombre: {{$user->first_name}}</p>
                <p>Email: {{$user->email}}</p>
                <p>Activo: @if($user->active === 1) SI @else NO @endif</p>
                <p>Twitter: @if(empty($user->twitter)) No Registrado @else {{$user->twitter}} @endif</p>
                <hr/>
            @endforeach
    </div>
@endsection
