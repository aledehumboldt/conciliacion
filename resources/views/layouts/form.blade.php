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
        <select id="perfil" name="perfil" class="custom-select" >
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
        <button type="submit" name="crear" id="crear" class="btn btn-secondary">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 19V5C3 3.89543 3.89543 3 5 3H16.1716C16.702 3 17.2107 3.21071 17.5858 3.58579L20.4142 6.41421C20.7893 6.78929 21 7.29799 21 7.82843V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19Z" stroke="currentColor" stroke-width="1.5" />
                <path d="M8.6 9H15.4C15.7314 9 16 8.73137 16 8.4V3.6C16 3.26863 15.7314 3 15.4 3H8.6C8.26863 3 8 3.26863 8 3.6V8.4C8 8.73137 8.26863 9 8.6 9Z" stroke="currentColor" stroke-width="1.5" />
                <path d="M6 13.6V21H18V13.6C18 13.2686 17.7314 13 17.4 13H6.6C6.26863 13 6 13.2686 6 13.6Z" stroke="currentColor" stroke-width="1.5" />
            </svg>
            {{$mod}}</button>
        @if ($mod == "Actualizar")
            <a href="{{route('password.edit',$usuario->id)}}" name="reiniciar" id="reiniciar" class="btn btn-secondary">
                <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 30 30"
style="fill:#FFFFFF;">
                    <path d="M 15 3 C 12.031398 3 9.3028202 4.0834384 7.2070312 5.875 A 1.0001 1.0001 0 1 0 8.5058594 7.3945312 C 10.25407 5.9000929 12.516602 5 15 5 C 20.19656 5 24.450989 8.9379267 24.951172 14 L 22 14 L 26 20 L 30 14 L 26.949219 14 C 26.437925 7.8516588 21.277839 3 15 3 z M 4 10 L 0 16 L 3.0507812 16 C 3.562075 22.148341 8.7221607 27 15 27 C 17.968602 27 20.69718 25.916562 22.792969 24.125 A 1.0001 1.0001 0 1 0 21.494141 22.605469 C 19.74593 24.099907 17.483398 25 15 25 C 9.80344 25 5.5490109 21.062074 5.0488281 16 L 8 16 L 4 10 z"></path>
                    </svg>
                Reestablecer</a>
        @endif
        <a href="{{route('usuarios.index')}}" class="btn btn-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 14 14">
                <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
            </svg>
            Volver
        </a>
    </div>
</div>