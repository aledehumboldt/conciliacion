<div class="modal fade text-black" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Incluir Trafico gris</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('bypassImsi.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-container">
                        <div class="form-floating mb-3">
                            <input type="text" autocomplete="off" name="ticket" id="ticket" class="form-control"
                                value="{{old('ticket')}}" placeholder="" onkeypress='return validaNumericos(event)' maxlength="10">
                            <label for="ticket" class="form-label">Ingresa ticket</label>
                        </div>
                        <label for="imsi" class="form-label">IMSI</label>
                        <div style="display: flex; align-items: center;justify-content: center;" class="mb-3">
                            <input type="text" autocomplete="off" name="imsi" id="imsi" value="{{old('imsi')}}"
                            class="form-control" placeholder="Ingrese imsi" pattern=".{15,15}" onkeypress='return validaNumericos(event)'
                            maxlength="15">
                        </div>
                        <div class="mb-3">
                            <label for="inicio" class="form-label">Fecha recepcion de requerimiento.</label>
                            <input type="text" autocomplete="off" name="inicio" id="inicio" class="form-control" value="{{old('inicio')}}" placeholder="Día/Mes/Año hora:min segs" onfocus="this.type='datetime-local'" onblur="
                            this.type='text'">
                        </div>
                        <label for="observaciones" class="form-label">Observaciones</label>
                        <div class="form-floating mb-3">
                            <textarea name="observaciones" id="observaciones" cols="35" rows="5">{{old('observaciones')}}</textarea>
                        </div>
                        <div class="text-center">
                            <h6>Todos los campos son obligatorios</h6>
                            <button type="submit" name="incluir" id="incluir" class="btn btn-secondary">
                                <svg class="bi"><use xlink:href="#store"/></svg>
                                Incluir IMSI
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