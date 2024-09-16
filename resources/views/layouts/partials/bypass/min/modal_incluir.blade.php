    <div class="modal fade text-secondary" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Incluir Trafico gris</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('bypassMin.store')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-container">
                            <div class="form-floating mb-3">
                                <input type="text" autocomplete="off" name="ticket" id="ticket" class="form-control"
                                    value="{{old('ticket')}}" placeholder="" onkeypress='return validaNumericos(event)' maxlength="10">
                                <label for="ticket" class="form-label">Ingresa ticket *</label>
                            </div>
                            <label for="min" class="form-label">Celular *</label>
                            <div style="display: flex; align-items: center;justify-content: center;" class="mb-3">
                                <select name="codarea" id="codarea" class="custom-select" style="width:100px" required>
                                    <option value="">Código</option>
                                    <option value="416">0416</option>
                                    <option value="426">0426</option>
                                </select>
                                <input type="text" autocomplete="off" name="min" id="min" value="{{old('min')}}"
                                class="form-control" placeholder="Ingrese abonado" pattern=".{7,7}"
                                onkeypress='return validaNumericos(event)' maxlength="7">
                            </div>
                            <div class="mb-3">
                                <label for="fecha" class="form-label">Fecha inicio de incidencia *</label>
                                <input type="text" autocomplete="off" name="inicio" id="inicio" class="form-control" value="{{old('inicio')}}" placeholder="Día/Mes/Año hora:min segs" onfocus="this.type='datetime-local'" onblur="
                                this.type='text'">
                            </div>
                            <div class="mb-3">
                                <label for="fecha" class="form-label">Fecha fin de requerimiento.</label>
                                <input type="text" autocomplete="off" name="fin" id="fin" class="form-control" value="{{old('fin')}}" placeholder="Día/Mes/Año hora:min segs" onfocus="this.type='datetime-local'" onblur="
                                this.type='text'">
                            </div>
                            <div class="mb-3">
                                <select id="tcliente" name="tcliente" class="custom-select">
                                    <option value="">Tipo de cliente *</option>
                                    <option value="PREPAGO">PREPAGO</option>
                                    <option value="POSTPAGO">POSTPAGO</option>
                                </select>
                            </div>
                            <label for="observaciones" class="form-label">Observaciones *</label>
                            <div class="form-floating mb-3">
                                <textarea name="observaciones" id="observaciones" cols="42" rows="5">{{old('observaciones')}}</textarea>
                            </div>
                            <h6>* Campos Obligatorios</h6>
                            <div class="text-center">
                                <button type="submit" name="incluir" id="incluir" class="btn btn-secondary">
                                    <svg class="bi"><use xlink:href="#store"/></svg>
                                    Incluir abonado
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