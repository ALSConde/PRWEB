<!-- construct basic the page -->
@extends('layout.app')

<!-- construct the home page -->
@section('content')
    <div class="container">
        <x-local-sistema local="Lista de autores" url="/home" texto="Menu Principal" />
        <div class="tile">
            <div class="tile-body">
                <form method="POST" class="form-inline" action="{{ route('autor.index') }}">
                    @csrf
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="pesquisa" class="control-label">Pesquisar:</label>
                            <input type="text" class="form-control col-sm-5" id="pesquisa" name="pesquisa"
                                placeholder="Digite um dado para pesquisa" value="{{ $filters['pesquisa'] }}">
                            <label for="quantidade" class="control-label">Quantidade:</label>
                            <select name="pagina" id="quantidade" class="form-control">
                                @foreach ($tamPagina as $perPage)
                                    <option value="{{ $perPage }}" @if ($item == $perPage) selected @endif>
                                        {{ $perPage }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-primary">
                                    Pesquisar
                                    <i class="fa fa-search-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="container">
            @include('layout.alert')
        </div>
        <div class="container">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th style="font-weight: bold; text-align: center">id</th>
                            <th style="font-weight: bold; text-align: center">Nome</th>
                            <th style="font-weight: bold; text-align: center">Apelido</th>
                            <th style="font-weight: bold; text-align: center">Telefone</th>
                            <th style="font-weight: bold; text-align: center">E-mail</th>
                            <th style="font-weight: bold; text-align: center">Ações</th>
                        </tr>
                        <tbody>
                            @forelse  ($registros as $registro)
                                <tr>
                                    <td style="text-align: center">{{ $registro->id }}</td>
                                    <td style="text-align: center">
                                        <a href="{{ route('autor.livros', $registro->id) }}">
                                            {{ $registro->nome }}
                                        </a>
                                    </td>
                                    <td style="text-align: center">{{ $registro->apelido }}</td>
                                    <td style="text-align: center">{{ $registro->telefone }}</td>
                                    <td style="text-align: center">{{ $registro->email }}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{ route('autor.edit', $registro->id) }}"><i
                                                class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger btn-sm" id="excluir"
                                            href="{{ route('autor.delete', $registro->id) }}"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
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
                    <a class="btn btn-success btn-lg" href="{{ route('autor.create') }}">
                        <i class="fa fa-plus-circle"> Incluir novos Autores</i>
                    </a>
                    <a class="btn btn-success btn-lg" href="{{ route('autor.export', ['extensao' => 'xlsx']) }}">
                        <i class="fa fa-plus-circle"> XLSX</i>
                    </a>
                    <a class="btn btn-success btn-lg" href="{{ route('autor.export', ['extensao' => 'csv']) }}">
                        <i class="fa fa-plus-circle"> CSV</i>
                    </a>
                    <a class="btn btn-success btn-lg" href="{{ route('autor.exportar') }}" target="_blank">
                        <i class="fa fa-plus-circle"> PDF</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
