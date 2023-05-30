<!-- construct basic the page -->
@extends('layout.app')

<!-- construct the home page -->
@section('content')
    <div class="container">
        <x-local-sistema local="Lista de livros por autores" url="/home" texto="Menu Principal" />
        <div class="container">
            @include('layout.alert')
        </div>
        <div class="container">
            <div class="tile">
                <div class="tile-body">
                    <div class="col-xs-12 col-sm-12">
                        <form class="form-group form form-inline" action="{{ route('usuario.role.salvar') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="quantidade" class="control-label">Nome do Usuario:</label>
                                <input type="text" class="form-control col-sm-9" value="{{ $user->name }}" disabled>
                            </div>
                            <table class="table table-striped table-bordered table-hover">
                                <tr>
                                    <th style="font-weight: bold; text-align: center">id</th>
                                    <th style="font-weight: bold; text-align: center">nome</th>
                                    <th style="font-weight: bold; text-align: center">descricao</th>
                                    <th style="font-weight: bold; text-align: center">Atribuido</th>
                                    <th style="font-weight: bold; text-align: center">Ações</th>
                                </tr>
                                <tbody>
                                    @forelse  ($registros as $registro)
                                        <tr>
                                            <td style="text-align: center;">{{ $registro->id }}</td>
                                            <td style="text-align: center;">{{ $registro->nome }}</td>
                                            <td style="text-align: center;">{{ $registro->descricao }}</td>
                                            <td style="text-align: center;">
                                                <input type="checkbox" id="role_{{ $registro->id }}" name="roles[]"
                                                    @if ($user->roles->contains($registro)) checked @endif
                                                    value="{{ $registro->id }}" />
                                            </td>
                                            <td>
                                                <a class="btn btn-danger btn-sm" id="excluir"
                                                    href="{{ route('usuario.role.excluir', [$user->id, $registro->id]) }}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" style="text-align: center">Nenhum registro encontrado.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <input type="hidden" id="user_id" name="user-id" value="{{ $user->id }}">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="fa fa-plus-circle"> Incluir novos papeis de usuario</i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
