<div class="form-container">
    <div  class="form-floating mb-3">
        <input type="text" name="nombre" id="nombre" class="form-control"
            value="{{isset($usuario->nombre) ? $usuario->nombre : old('nombre')}}" placeholder="Ingresar nombre">
        <label for="nombre" class="form-label">Nombre</label>
    </div>
    <div  class="form-floating mb-3">
        <input type="text" name="usuario" id="usuario" value="{{isset($usuario->usuario) ? $usuario->usuario : old('usuario')}}"  class="form-control" placeholder="Ingresar cédula">
        <label for="usuario" class="form-label">Cédula</label>
    </div>
    @if ($mod == "Crear")
        <input type="hidden" name="creado_por" id="creado_por" value="{{auth()->user()->usuario}}">
    @endif
    <input type="hidden" name="estatus" id="estatus" value="{{isset($usuario->estatus) ? $usuario->estatus : 'Iniciado'}}">
    <div class="mb-3">
        <select id="perfil" name="perfil" class="form-control" >
            <option value="">Selecciona el área</option>
            <option value="SA"
            @isset($usuario->perfil)
                @if ($usuario->perfil == "SA") selected @endif
            @endisset
            >Soporte de Averías</option>
            <option value="CYA"
            @isset($usuario->perfil)
                @if ($usuario->perfil == "CYA") selected @endif
            @endisset
            >Aprovisionamiento</option>
        </select>
      </div>
    <input type="hidden" name="clave" id="clave" value="{{isset($usuario->clave) ? $usuario->clave : ''}}">
    <div class="text-center pt-1 mb-5 pb-1">
        <button type="submit" name="crear" id="crear" class="btn btn-secondary btn-block fa-lg gradient-custom-2 mb-3">{{$mod}}</button>
        @if ($mod == "Actualizar")
            <a href="{{route('password.reset',$usuario->id)}}" name="reiniciar" id="reiniciar" class="btn btn-secondary btn-block fa-lg gradient-custom-2 mb-3">Reestablecer</a>
        @endif
    </div>
</div>