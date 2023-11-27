@if (isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        <ul class="list-unstyled mb-0">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::get('success', false))
    <?php $data = Session::get('success'); ?>
    @if (is_array($data))
        @foreach ($data as $message)
            <div alert alert-success>
                <i class="fa fa-check"></i>
                {{$message}}
            </div>
        @endforeach
    @else
        <div alert alert-success>
            <i class="fa fa-check"></i>
            {{$data}}
        </div>
    @endif
@endif

@if (Session::has('mensaje'))
    <div class="alert alert-secondary alert-dismissible" role="alert">
        <strong>{{Session::get('mensaje')}}</strong>
        <button class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif