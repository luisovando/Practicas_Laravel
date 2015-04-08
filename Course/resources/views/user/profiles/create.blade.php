@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Nuevo Perfil Usuario</div>
                    <div class="panel-body">
                        @include('admin.partials.messages')
                        {!! Form::open(['route' => 'user.profile.store', 'method' => 'post']) !!}
                            <div class="form-group">
                                {!! Form::label('user_id', 'Usuario') !!}
                                {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
                            </div>
                            @include('user.profiles.partials.fields')
                            <button type="submit" class="btn btn-default">Crear Perfil</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection