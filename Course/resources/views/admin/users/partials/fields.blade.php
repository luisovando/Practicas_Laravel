<div class="form-group">
    {!! Form::label('email', 'Correo electrónico') !!}
    {!! Form::email('email', null,[
    'class' => 'form-control',
    'placeholder' => 'Ingresa tu email'
    ]
    )!!}
</div>
<div class="form-group">
    {!! Form::label('password', 'Contraseña') !!}
    {!! Form::password('password',[
        'class' => 'form-control',
        'placeholder' => 'Password'
    ]
    )!!}
</div>
<div class="form-group">
    {!! Form::label('password_confirmation', 'Confirma tu Contraseña') !!}
    {!! Form::password('password_confirmation',[
        'class' => 'form-control',
        'placeholder' => 'Password'
    ]
    )!!}
</div>
<div class="form-group">
    {!! Form::label('first_name', 'Primer Nombre') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('last_name', 'Apellido') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('type', 'Tipo de Usuario') !!}
    {!! Form::select('type', [
    '' => 'Seleccione Tipo de Usuario',
    'user' => 'Usuario',
    'admin' => 'Administrador'
    ], null,
    ['class' => 'form-control']
    ) !!}
</div>
<div class="form-group">
    {!! Form::label('gender', 'Género') !!}
    {!! Form::select('gender',[
    '' => 'Selecciona un género',
    'male' => 'Masculino',
    'female' => 'Femenino'
    ], null,
    ['class' => 'form-control']
    )!!}
</div>