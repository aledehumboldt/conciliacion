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
    <form action="{{ route('bypassMin.destroy',$numero)}}" enctype="multipart/form-data" method="POST">
        @csrf
    <div class="form-container">
        <h6>Para excluir es necesario rellenar el presente formulario:</h6>
        <div class="form-floating mb-3">
            <input type="text" autocomplete="off" name="ticket" id="ticket" class="form-control"
                value="{{old('ticket')}}" placeholder="">
            <label for="ticket" class="form-label text-secondary">Ingresa ticket</label>
        </div>
        <div class="mb-3">
            <label for="inicio" class="form-label text-secondary">Fecha Inicio</label>
            <input type="text" autocomplete="off" name="inicio" id="inicio" class="form-control" value="{{old('inicio')}}" placeholder="Día/Mes/Año hora:min segs" onfocus="this.type='datetime-local'" onblur="
            this.type='text'">
        </div>        
        <div class="mb-3">
            <label for="fin" class="form-label text-secondary">Fecha Fin</label>
            <input type="text" autocomplete="off" name="fin" id="fin" class="form-control" value="{{old('fin')}}" placeholder="Día/Mes/Año hora:min segs" onfocus="this.type='datetime-local'" onblur="
            this.type='text'">
        </div>
        <label for="descripcion" class="form-label text-secondary">Descripcion</label>
        <div class="form-floating mb-3">
          <textarea name="descripcion" id="descripcion" cols="42" rows="5">{{old('descripcion')}}</textarea>
      </div>
      <div class="mb-3">
        <label for="solicitante" class="form-label">Solicitante</label>
        <select name="solicitante" id="solicitante" class="form-control custom-select">
            <option value="">Seleccione</option>
            <option value="Soprte de Averias">Soprte de Averias</option>
            <option value="CYA">CyA</option>
        </select>
      </div>
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