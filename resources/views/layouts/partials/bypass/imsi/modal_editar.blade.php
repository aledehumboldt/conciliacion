    <div class="modal fade" id="exampleModal3{{$bypas_imsi->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edicion Trafico gris</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
    <form action="{{ route('bypassImsi.update', $bypas_imsi->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
    <div class="form-container">
        <div class="form-floating mb-3">
            <input type="text" autocomplete="off" name="ticket" id="ticket" class="form-control" placeholder="Ingresar ticket" value="{{ $bypas_imsi->ticket }}" required>
            <label for="ticket" class="form-label">Ingresa ticket</label>
        </div>
        <label for="imsi" class="form-label">Imsi</label>
        <div style="display: flex; align-items: center;justify-content: center;" class="mb-3">
        <input type="text" autocomplete="off" name="imsi" id="imsi" value="{{ $bypas_imsi->imsi }}" class="form-control" placeholder="Ingrese imsi" pattern=".{15,15}">
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="text" autocomplete="off" name="fecha" id="fecha" class="form-control" value="{{ $bypas_imsi->fecha }}" placeholder="Día/Mes/Año hora:min segs" onfocus="this.type='datetime-local'" onblur="
            this.type='text'">
        </div>
    <label for="observaciones" class="form-label">Observaciones</label>
    <div class="form-floating mb-3">
          <textarea name="observaciones" id="observaciones" cols="35" rows="5">{{ $bypas_imsi->observaciones }}</textarea>
    </div>
        <div class="text-center pt-1 mb-5 pb-1">
            <button type="submit" name="editar" id="editar" class="btn btn-secondary">
                <svg class="bi"><use xlink:href="#store"/></svg>
                Actualizar registro
            </button>
        </div>
    </div>
</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>