<!-- construct basic the page -->
@extends('layout.app')

<!-- construct the home page -->
@section('content')
    <div class="container">
        <div class="container">
            {{-- pesquisa --}}
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
                    {{ $registros->links() }}
                    <a class="btn btn-success btn-lg" href="{{ url('/usuario/incluir') }}">
                        <i class="fa fa-plus-circle"> Incluir novos usuários</i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
