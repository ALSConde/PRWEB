<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column align-center text-center">
                    <img src="{{ asset('img/user.svg') }}">
                    <div class="mt-3">
                        <div class="fileInput">
                            <input type="file">
                            <button id="upload" class="btn btn-success btn-lg upload" title="upload de fotos">
                                <i style="font-size: 1.875rem" class="fa fa-upload"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="name" class="control-label">Nome:</label>
                    <input id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ isset($registro->name) ? $registro->name : '' }}" />
                    @error('name')
                        <span class="invalid-feedback">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="email" class="control-label">E-mail:</label>
                    <input id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ isset($registro->email) ? $registro->email : '' }}" />
                    @error('email')
                        <span class="invalid-feedback">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
