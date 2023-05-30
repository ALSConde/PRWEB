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
                        <form class="form-group form form-inline" action="{{ route('role.permissao.salvar') }}"
                            method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="quantidade" class="control-label">Nome do Usuario:</label>
                                <input type="text" class="form-control col-sm-9" value="{{ $user->name }}" disabled>
                            </div>
                            <table class="table table-striped table-bordered table-hover">
                                <tr>
                                    <th style="font-weight: bold; text-align: center">Recurso</th>
                                    @foreach ($actions as $action)
                                        <th style="font-weight: bold; text-align: center">{{ $action->nome }}</th>
                                    @endforeach
                                    <th style="font-weight: bold; text-align: center">Ações</th>
                                </tr>
                                <tbody>
                                    @forelse  ($registros as $registro)
                                        <tr>

                                            <td style="text-align: center;">{{ $registro->nome }}</td>
                                            <td style="text-align: center;">
                                                <input type="checkbox" id="permissao_{{ $registro->id }}" name="permissao[]"
                                                    @if ($registro->existePermissao($registro->id)) checked @endif
                                                    value="{{ $registro->id }}" />
                                            </td>
                                            @foreach ($actions as $action)
                                                <td style="text-align: center;">
                                                    <input type="checkbox" id="action_{{ $action->id }}" name="action[]"
                                                        @if ($action->existePermissaoAction($registro->id, $action->id)) checked @endif
                                                        value="{{ $action->id }}" />
                                            @endforeach
                                            <td>
                                                <a class="btn btn-danger btn-sm" id="excluir"
                                                    href="{{ route('role.permissao.excluir', [$role->id, $registro->id, $action->id]) }}">
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
                            <input type="hidden" id="role_id" name="role-id" value="{{ $role->id }}">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="fa fa-plus-circle"> Incluir Permissões para Roles</i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
