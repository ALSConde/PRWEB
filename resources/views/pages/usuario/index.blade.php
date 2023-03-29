<!-- construct basic the page -->
@extends('layout.app')

<!-- construct the home page -->
@section('content')
    <div class="container">
        <div class="container">
            <div class="tile">
                <div class="tile.body">
                    <form method="POST" class="form-inline" action="{{ url('/usuario/listar') }}">
                        @csrf
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="pesquisa" class="control-label">Pesquisar:</label>
                                <input type="text" class="form-control col-sm-5" id="pesquisa" name="pesquisa"
                                    placeholder="Digite um dado para pesquisa">
                                <label for="quantidade" class="control-label">Quantidade:</label>
                                <select name="pagina" id="quantidade" class="form-control">
                                    @foreach ($tamPagina as $qtd)
                                        <option value="{{ $qtd }}"
                                            @if($item==$qtd) selected @endif>
                                            {{ $qtd }}
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
        </div>
        <div class="container">
            @include('layout.alert')
        </div>
        <div class="container">
            <div class="tile">
                <div class="tile.body">
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th style="font-weight: bold; text-align: center">id</th>
                            <th style="font-weight: bold; text-align: center">Nome</th>
                            <th style="font-weight: bold; text-align: center">E-mail</th>
                            <th style="font-weight: bold; text-align: center">Ações</th>
                        </tr>
                        <tbody>
                            {{-- {{dd($registros)}} --}}
                            @forelse  ($registros as $registro)
                                <tr>
                                    <td style="text-align: center">{{ $registro->id }}</td>
                                    <td style="text-align: center">{{ $registro->name }}</td>
                                    <td style="text-align: center">{{ $registro->email }}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm"
                                            href="{{ url('/usuario/alterar/' . $registro->id) }}"><i
                                                class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger btn-sm"
                                            href="{{ url('/usuario/excluir', $registro->id) }}"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" style="text-align: center">Nenhum registro encontrado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="pagination justify-content-end">
                        {{ $registros->links() }}
                    </div>
                    <a class="btn btn-success btn-lg" href="{{ url('/usuario/incluir') }}">
                        <i class="fa fa-plus-circle"> Incluir novos usuários</i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
