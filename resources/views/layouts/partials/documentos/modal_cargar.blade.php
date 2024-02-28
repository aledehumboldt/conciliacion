<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Subir archivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('documentacion.index')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="file" name="file" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <select name="categoria" id="categoria" class="custom-select" style="width:450px" required>
                            <option value="">Categoria</option>
                            @php $dirs = scandir('storage'); @endphp
                            @foreach ($dirs as $dir)
                                @if ($dir != ".." && $dir != "." && $dir != "cpa" && is_dir('storage/'.$dir))
                                    <option value="{{$dir}}">{{$dir}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="guardar" id="guardar" class="btn btn-secondary">
                            <svg class="bi"><use xlink:href="#store"/></svg>
                            Guardar
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