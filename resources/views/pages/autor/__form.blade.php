@include('layout.validate')
<div class="row">
    <div class="col-md-8">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="nome" class="control-label">Nome:</label>
                    <input id="nome" name="nome" class="form-control @error('nome') is-invalid @enderror"
                        value="{{ isset($registro->name) ? $registro->name : '' }}" />
                    @error('nome')
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
                    <label for="apelido" class="control-label">Apelido:</label>
                    <input id="apelido" name="apelido" class="form-control @error('apelido') is-invalid @enderror"
                        value="{{ isset($registro->apelido) ? $registro->apelido : '' }}" />
                    @error('apelido')
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
                    <label for="endereco" class="control-label">Endereço:</label>
                    <input id="endereco" name="endereco" class="form-control @error('endereco') is-invalid @enderror"
                        value="{{ isset($registro->endereco) ? $registro->endereco : '' }}" />
                    @error('endereco')
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
                    <label for="bairro" class="control-label">Bairro:</label>
                    <input id="bairro" name="bairro" class="form-control @error('bairro') is-invalid @enderror"
                        value="{{ isset($registro->bairro) ? $registro->bairro : '' }}" />
                    @error('bairro')
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
                    <label for="cep" class="control-label">Cep:</label>
                    <input id="cep" name="cep" class="form-control @error('cep') is-invalid @enderror"
                        value="{{ isset($registro->cep) ? $registro->cep : '' }}" />
                    @error('cep')
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
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="telefone" class="control-label">Telefone:</label>
                    <input id="telefone" name="telefone" class="form-control @error('telefone') is-invalid @enderror"
                        value="{{ isset($registro->telefone) ? $registro->telefone : '' }}" />
                    @error('telefone')
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
