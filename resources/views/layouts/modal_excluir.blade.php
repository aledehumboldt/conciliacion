    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir del listado Trafico gris</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
    <form action="{{ route('bypass.bypassMin.store-incidencia',$bypas_min->id)}}" enctype="multipart/form-data" method="POST">
        @csrf
    <div class="form-container">
        <h6>Para excluir es necesario rellenar el presente formulario:</h6>
        &nbsp
        <h7>Rellene por favor los campos</h7>
        <div class="form-floating mb-3">
            <input type="text" name="ticket" id="ticket" class="form-control"
                value="{{old('ticket')}}" placeholder="">
            <label for="ticket" class="form-label">Ingresa ticket</label>
        </div>
        <div class="mb-3">
            <label for="inicio" class="form-label">Fecha Inicio</label>
            <input type="text" name="inicio" id="inicio" class="form-control" value="{{old('inicio')}}" placeholder="Día/Mes/Año hora:min segs" onfocus="this.type='datetime-local'" onblur="
            this.type='text'">
        </div>        
        <div class="mb-3">
            <label for="fin" class="form-label">Fecha Fin</label>
            <input type="text" name="fin" id="fin" class="form-control" value="{{old('fin')}}" placeholder="Día/Mes/Año hora:min segs" onfocus="this.type='datetime-local'" onblur="
            this.type='text'">
        </div>
        <label for="descripcion" class="form-label">Descripcion</label>
        <div class="form-floating mb-3">
          <textarea name="descripcion" id="descripcion" cols="35" rows="5">{{old('descripcion')}}</textarea>
      </div>
      <div class="form-floating mb-3">
        <input type="text" name="solicitante" id="solicitante" class="form-control"
            value="{{old('solicitante')}}" placeholder="">
        <label for="ticket" class="form-label">Solicitante</label>
    </div>
       <div class="form-floating mb-3">
                <select name="tipo" id="tipo" class="form-control" style="width:350px">
                    <option value="">Seleccione para inicidencia o requerimiento:</option>
                    <option value="1">Requerimiento</option>
                </select>
    </div>
        <div class="text-center">
            <button type="submit" name="agregar" id="agregar" class="btn btn-secondary">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 19V5C3 3.89543 3.89543 3 5 3H16.1716C16.702 3 17.2107 3.21071 17.5858 3.58579L20.4142 6.41421C20.7893 6.78929 21 7.29799 21 7.82843V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19Z" stroke="currentColor" stroke-width="1.5" />
                    <path d="M8.6 9H15.4C15.7314 9 16 8.73137 16 8.4V3.6C16 3.26863 15.7314 3 15.4 3H8.6C8.26863 3 8 3.26863 8 3.6V8.4C8 8.73137 8.26863 9 8.6 9Z" stroke="currentColor" stroke-width="1.5" />
                    <path d="M6 13.6V21H18V13.6C18 13.2686 17.7314 13 17.4 13H6.6C6.26863 13 6 13.2686 6 13.6Z" stroke="currentColor" stroke-width="1.5" />
                </svg>
                Añadir Requerimiento</button>
                <a href="{{route('bypass.bypassMin.index')}}" class="btn btn-secondary">
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