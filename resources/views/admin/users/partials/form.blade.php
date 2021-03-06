<div class="form-group">
    {{ Form::label('name', 'Nombre del usuario') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('email', 'Correo') }}
    {{ Form::email('email', null, ['class' => 'form-control']) }}
</div>
<hr>
<h3>Lista de Roles</h3>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach ($roles as $role)
        <li>
            <label>
                {{ Form::checkbox('roles[]', $role->id, null) }}
                {{ $role->name }} /
                <em>{{ $role->description ?: 'Sin descripción' }}</em>
            </label>
        </li>
        @endforeach
    </ul>
</div>
<hr>
<div class="form-group">
    {{ Form::label('pedidos', '¿Desea que este usuario reciba los pedidos via Email?') }} <br>
    <label>
      {{ Form::radio('pedidos', 'RECIBIR') }}
      <span>Recibir pedidos</span>
    </label>
    <label>
      {{ Form::radio('pedidos', 'NO RECIBIR') }}
      <span>No recibir pedidos</span>
    </label>
</div>
<hr>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-success']) }}
</div>