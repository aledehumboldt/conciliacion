<div class="modal fade text-black" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buscar Abonado en lista blanca</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('bypassWhitelist.show',auth()->user()->id) }}" enctype="multipart/form-data" method="get">
                    @csrf
                    <div class="form-container">
                        <label for="celular" class="form-label">Celular</label>
                        <div style="display: flex; align-items: center;justify-content: center;" class="mb-3">
                            <select name="codarea" id="codarea" class="custom-select" style="width:100px" required>
                                <option value="">Código</option>
                                <option value="416">0416</option>
                                <option value="426">0426</option>
                            </select>
                            <input type="text" autocomplete="off" name="min" id="min" class="form-control" value="{{old('min')}}"
                            placeholder="Ingrese abonado" pattern=".{7,7}" onkeypress='return validaNumericos(event)' maxlength="7" required>
                        </div>
                        <button type="submit" class="btn btn-secondary" name="buscar" id="buscar">
                            <svg class="bi"><use xlink:href="#search"/></svg>
                            Consultar
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>