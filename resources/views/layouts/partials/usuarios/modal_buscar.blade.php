<div class="modal fade text-secondary" id="modalusers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buscar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('usuarios.show',auth()->user()->id) }}" enctype="multipart/form-data" method="get">
                    @csrf
                    <div class="form-container">
                        <div class="mb-3 form-floating">
                            <input type="text" name="busqueda" id="busqueda" class="form-control" required placeholder="">
                            <label for="busqueda" class="form-label">Introduzca Cedula</label>
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