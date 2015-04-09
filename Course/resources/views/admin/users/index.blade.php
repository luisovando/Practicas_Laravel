@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuarios</div>
                    @if(Session::has('message'))
                        <p class="alert alert-success">{{Session::get('message')}}</p>
                    @endif
                    <div class="panel-body">
                        <p>
                            <a class="btn btn-info" href="{{route('admin.users.create')}}" role="button">
                                Nuevo Usuario
                            </a>
                            <a class="btn btn-info" href="{{route('user.profile.create')}}" role="button">
                                Nuevo Profile
                            </a>
                        </p>
                        <p>
                            Existen {{ $users->total() }} usuarios registrados.
                        </p>
                        @include('admin.users.partials.table')
                        {!! $users->render() !!}
                        <p> Página {{ $users->currentPage() }} de {{ $users->lastPage() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::open(['route' => ['admin.users.destroy', ':ENTITY_ID'], 'method' => 'DELETE', 'class' => 'form-delete']) !!}
    {!! Form::close() !!}
@endsection