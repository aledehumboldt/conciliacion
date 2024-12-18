<div class="modal fade" id="exampleModal2{{$bypas_min->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir del listado Trafico gris</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('bypassMin.destroy',$bypas_min->min)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-container">
                        <div class="form-floating mb-3">
                            <input type="text" autocomplete="off" name="ticket" id="ticket" class="form-control"
                                value="{{old('ticket')}}" placeholder="" onkeypress='return validaNumericos(event)' maxlength="10" required>
                            <label for="ticket" class="form-label text-secondary">Ingresa ticket</label>
                        </div>
                        <div class="mb-3">
                            <label for="inicio" class="form-label text-secondary">Fecha recepcion de incidencia</label>
                            <input type="text" autocomplete="off" name="inicio" id="inicio" class="form-control" value="{{old('inicio')}}" placeholder="Día/Mes/Año hora:min segs" onfocus="this.type='datetime-local'" onblur="
                            this.type='text'" required>
                        </div>
                        <label for="descripcion" class="form-label text-secondary">Descripcion</label>
                        <div class="form-floating mb-3">
                            <textarea name="descripcion" id="descripcion" cols="42" rows="5" required>{{old('descripcion')}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="solicitante" class="form-label">Solicitante</label>
                            <select name="solicitante" id="solicitante" class="form-control custom-select" required>
                                <option value="">Seleccione</option>
                                <option value="SASM">Soporte de Aplicaciones</option>
                                <option value="Conciliacion">Conciliacion</option>
                            </select>
                        </div>
                        <h6>Todos los campos son obligatorios.</h6>
                        <div class="text-center">
                            <button type="submit" name="excluir" id="excluir" class="btn btn-secondary">
                                <svg class="bi"><use xlink:href="#store"/></svg>
                                Excluir abonado
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