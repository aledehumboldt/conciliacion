    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar incidencias</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
    <form method="POST" enctype="multipart/form-data" id="sample_form">
        <div class="form-container">
            <div class="form-floating mb-3">
                <input type="text" autocomplete="off" name="ticket" id="ticket" class="form-control" required>
                <label for="ticket" class="form-label text-secondary">Ingresa ticket:</label>
            </div>
            <div class="mb-3">
                <label for="inicio" class="form-label">Fecha Inicio</label>
                <input type="datetime-local" name="inicio" id="inicio" class="form-control" required placeholder="Día/Mes/Año">
            </div>
            <div class="mb-3">
                <label for="fin" class="form-label">Fecha Fin</label>
                <input type="datetime-local" name="fin" id="fin" class="form-control" placeholder="Día/Mes/Año">
            </div>
            <div class="form-floating mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <textarea name="descripcion" id="descripcion" cols="36" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <select name="tipo" id="tipo" class="form-control custom-select">
                    <option value="">Seleccione</option>
                    <option value="incidencia">Incidencia</option>
                    <option value="requerimiento">Requerimiento</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="solicitante" class="form-label">Solicitante</label>
                <select name="solicitante" id="solicitante" class="form-control custom-select">
                    <option value="">Seleccione</option>
                    <option value="CYA">CYA</option>
                    <option value="Soporte de Averias">Soporte de Averias</option>
                </select>
            </div>
            <input type="hidden" name="hidden_id" id="hidden_id">
        </div>
    </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <input type="submit" name="action_button" id="action_button" value="add" class="btn btn-info" />
            </div>
    </div>
    </div>