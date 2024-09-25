    <div class="modal fade" id="modal-bypassmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title-bypassmin">Edicion incluir Trafico gris</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
    <form id="BypassMin" name="BypassMin" enctype="multipart/form-data" method="POST">
    <div class="form-container">
        <div class="form-floating mb-3">
            <input type="text" autocomplete="off" name="ticket" id="ticket" class="form-control" placeholder="Ingresar ticket" required>
            <label for="ticket" class="form-label text-secondary">Ingresa ticket</label>
        </div>
        <label for="min" class="form-label text-secondary">Celular</label>
        <div style="display: flex; align-items: center;justify-content: center;" class="mb-3">
        <select name="codarea" id="codarea" class="custom-select" style="width:100px" required>
        <option>0416</option>
        <option>0426</option>
        </select>
        <input type="text" autocomplete="off" name="min" id="min" class="form-control" placeholder="Ingrese abonado" pattern=".{7,7}">
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label text-secondary">Fecha</label>
            <input type="text" autocomplete="off" name="fecha" id="fecha" class="form-control" placeholder="Día/Mes/Año hora:min segs" onfocus="this.type='datetime-local'" onblur="
            this.type='text'">
        </div>
    <div class="mb-3">
            <select id="tcliente" name="tcliente" class="custom-select" required>
                <option>Prepago</option>
                <option>Postpago</option>
            </select>
    </div>
    <label for="observaciones" class="form-label text-secondary">Observaciones</label>
    <div class="form-floating mb-3">
          <textarea name="observaciones" id="observaciones" cols="42" rows="5"></textarea>
    </div>
        <div class="text-center pt-1 pb-1">
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