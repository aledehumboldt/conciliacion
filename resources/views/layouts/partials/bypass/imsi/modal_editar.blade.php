    <div class="modal fade" id="exampleModal3{{$bypas_imsi->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edicion incluir Trafico gris</h5>
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
            <input type="text" name="ticket" id="ticket" class="form-control" placeholder="Ingresar ticket" value="{{ $bypas_imsi->ticket }}" required>
            <label for="ticket" class="form-label">Ingresa ticket</label>
        </div>
        <label for="imsi" class="form-label">Imsi</label>
        <div style="display: flex; align-items: center;justify-content: center;" class="mb-3">
        <input type="text" name="imsi" id="imsi" value="{{ $bypas_imsi->imsi }}" class="form-control" placeholder="Ingrese imsi" pattern=".{15,15}">
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="text" name="fecha" id="fecha" class="form-control" value="{{ $bypas_imsi->fecha }}" placeholder="Día/Mes/Año hora:min segs" onfocus="this.type='datetime-local'" onblur="
            this.type='text'">
        </div>
    <label for="observaciones" class="form-label">Observaciones</label>
    <div class="form-floating mb-3">
          <textarea name="observaciones" id="observaciones" cols="35" rows="5">{{ $bypas_imsi->observaciones }}</textarea>
    </div>
        <div class="text-center pt-1 mb-5 pb-1">
            <button type="submit" name="editar" id="editar" class="btn btn-secondary">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 19V5C3 3.89543 3.89543 3 5 3H16.1716C16.702 3 17.2107 3.21071 17.5858 3.58579L20.4142 6.41421C20.7893 6.78929 21 7.29799 21 7.82843V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19Z" stroke="currentColor" stroke-width="1.5" />
                    <path d="M8.6 9H15.4C15.7314 9 16 8.73137 16 8.4V3.6C16 3.26863 15.7314 3 15.4 3H8.6C8.26863 3 8 3.26863 8 3.6V8.4C8 8.73137 8.26863 9 8.6 9Z" stroke="currentColor" stroke-width="1.5" />
                    <path d="M6 13.6V21H18V13.6C18 13.2686 17.7314 13 17.4 13H6.6C6.26863 13 6 13.2686 6 13.6Z" stroke="currentColor" stroke-width="1.5" />
                </svg>
                Editar Inclusion</button>
                <a href="{{route('bypassImsi.index')}}" class="btn btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 14 14">
                        <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                    </svg>
                    Volver
                </a>
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