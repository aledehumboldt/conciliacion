<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buscar en Exclusiones</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex justify-content-center    ">
                <form action="{{ route('exclusiones.show',auth()->user()->id) }}" enctype="multipart/form-data" method="get">
                    @csrf
                    <div class="mb-3">
                        <label for="celularB" class="form-label text-secondary">Celular</label>
                        <div style="display: flex; align-items: center;justify-content: center;" class="mb-3">
                            <select name="codigo" id="codigo" class="custom-select" style="width:100px" required>
                                <option value="">Código</option>
                                <option value="416">0416</option>
                                <option value="426">0426</option>
                            </select>
                            <input type="text" autocomplete="off" name="celular" id="celular" value="{{old('celular')}}"
                            class="form-control" placeholder="Ingrese abonado" pattern=".{7,7}"
                            onkeypress='return validaNumericos(event)' maxlength="7" required>
                        </div>

                        <div class="text-center">
                        <button type="submit" class="btn btn-secondary" name="buscar" id="buscar">
                            <svg class="bi"><use xlink:href="#search"/></svg>
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