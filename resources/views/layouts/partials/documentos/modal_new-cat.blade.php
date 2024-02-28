    <div class="modal fade" id="newcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('category')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" autocomplete="off" class="form-control" name="categoria" id="categoria" value="{{old('categoria')}}" placeholder="Introduzca Categoria">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="guardar" id="guardar" class="btn btn-secondary">
                            <svg class="bi"><use xlink:href="#store"/></svg>
                            Crear
                        </button>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>