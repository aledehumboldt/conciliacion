<div class="form-container">
    <div  class="form-floating mb-3">
        <input type="text" autocomplete="off" name="nombre" id="nombre" class="form-control" placeholder="Ingresar nombre"
            value="{{isset($usuario->nombre) ? $usuario->nombre : old('nombre')}}" maxlength="18" onkeypress='return validaLetras(event)'>
        <label for="nombre" class="form-label text-secondary">Nombre</label>
    </div>
    <div  class="form-floating mb-3">
        <input type="text" autocomplete="off" name="usuario" id="usuario" value="{{isset($usuario->usuario) ? $usuario->usuario : old('usuario')}}"
        class="form-control" placeholder="Ingresar cédula" maxlength="10" onkeypress='return validaNumericos(event)'>
        <label for="usuario" class="form-label text-secondary">Cédula</label>
    </div>
    @if ($mod == "Crear")
        <input type="hidden" name="creado_por" id="creado_por" value="{{auth()->user()->usuario}}">
    @endif
    <input type="hidden" name="estatus" id="estatus" value="{{isset($usuario->estatus) ? $usuario->estatus : 'Iniciado'}}">
    <div class="mb-3">
        <select id="perfil" name="perfil" class="custom-select" @if (auth()->user()->perfil == "SA") disabled @endif > 
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
    <div class="text-center">
        <button type="submit" name="crear" id="crear" class="btn btn-group btn-secondary">
            <svg class="bi"><use xlink:href="#store"/></svg>
            {{$mod}}
        </button>
        @if (auth()->user()->perfil == "CYA")
            @if ($mod == "Actualizar")
                <a href="{{route('password.edit',$usuario->id)}}" name="reiniciar" id="reiniciar" class="btn btn-group btn-secondary">
                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="1 0 30 30" style="fill:#FFFFFF;">
                        <path d="M 15 3 C 12.031398 3 9.3028202 4.0834384 7.2070312 5.875 A 1.0001 1.0001 0 1 0 8.5058594 7.3945312 C 10.25407 5.9000929 12.516602 5 15 5 C 20.19656 5 24.450989 8.9379267 24.951172 14 L 22 14 L 26 20 L 30 14 L 26.949219 14 C 26.437925 7.8516588 21.277839 3 15 3 z M 4 10 L 0 16 L 3.0507812 16 C 3.562075 22.148341 8.7221607 27 15 27 C 17.968602 27 20.69718 25.916562 22.792969 24.125 A 1.0001 1.0001 0 1 0 21.494141 22.605469 C 19.74593 24.099907 17.483398 25 15 25 C 9.80344 25 5.5490109 21.062074 5.0488281 16 L 8 16 L 4 10 z"></path>
                        </svg>
                    Reestablecer
                </a>
            @endif
            <a href="{{route('usuarios.index')}}" class="btn btn-group btn-secondary">
                <svg class="bi"><use xlink:href="#caret-left-fill"/></svg>
                Volver
            </a>
        @endif
    </div>
</div>