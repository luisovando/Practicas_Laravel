{!! Form::open(['route' => ['admin.users.destroy', $user], 'method' => 'DELETE']) !!}
    <button type="submit" onclick="return confirm('Deseas Eliminar Este Registro?')" class="btn btn-danger"> Eliminar usuario</button>
{!! Form::close() !!}