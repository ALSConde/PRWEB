<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="name" class="control-label">Nome:</label>
            @if ($usuario->id != null && url()->current() == url('/usuario/excluir/' . $usuario->id))
                <input id="name" name="name" class="form-control" value="{{ $usuario->name }} " readonly />
            @else
                <input id="name" name="name" class="form-control" value="{{ $usuario->name }} " />
            @endif
        </div>
        <div class="form-group">
            <label for="email" class="control-label">E-mail:</label>
            @if ($usuario->id != null && url()->current() == url('/usuario/excluir/' . $usuario->id))
                <input id="email" name="email" class="form-control" value="{{ $usuario->email }}" readonly />
            @else
                <input id="email" name="email" class="form-control" value="{{ $usuario->email }}" />
            @endif
        </div>
    </div>
</div>
