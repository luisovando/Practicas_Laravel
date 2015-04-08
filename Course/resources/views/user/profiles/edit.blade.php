@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Perfil De: {{$user->full_name}}</div>
                    <div class="panel-body">
                        {!! Form::model($profile, ['route' => ['user.profile.update', $profile], 'method' => 'PUT']) !!}
                            <div class="form-group">
                                {!! Form::label('user_id', 'Usuario') !!}
                                {!! Form::select('user_id', $users, $user->id, ['class' => 'form-control']) !!}
                            </div>
                            @include('user.profiles.partials.fields')
                            <button type="submit" class="btn btn-default">Actualizar Usuario</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection