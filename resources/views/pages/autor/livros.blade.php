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
                        <div class="form-group form form-inline">
                            <label class="control-label col-sm-2">Nome do Autor:</label>
                            <input class="form-control col-sm-9" value="{{ $nome }}" disabled readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th style="font-weight: bold; text-align: center">Titulo</th>
                            <th style="font-weight: bold; text-align: center">Edição</th>
                            <th style="font-weight: bold; text-align: center">Area</th>
                            <th style="font-weight: bold; text-align: center">Editora</th>

                        </tr>
                        <tbody>
                            @forelse  ($registros as $registro)
                                <tr>
                                    <td style="text-align: center">{{ $registro->titulo }}</td>
                                    <td style="text-align: center">{{ $registro->ano_edicao }}</td>
                                    <td style="text-align: center">{{ $registro->area }}</td>
                                    <td style="text-align: center">{{ $registro->editora->nome }}</td>
                                    {{-- <td>
                                        <a class="btn btn-info btn-sm" href="#"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger btn-sm" id="excluir" href="#"><i
                                                class="fa fa-trash"></i></a>
                                    </td> --}}
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="text-align: center">Nenhum registro encontrado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="pagination justify-content-end">
                        @if (isset($filters))
                            {{ $registros->appends($filters)->links() }}
                        @else
                            {{ $registros->links() }}
                        @endif
                    </div>
                    <a class="btn btn-success btn-lg" href="#">
                        <i class="fa fa-plus-circle"> Incluir novos Livros</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
