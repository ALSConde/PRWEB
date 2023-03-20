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
                            @foreach ($registers as $register)
                                <tr>
                                    <td style="text-align: center">{{ $register->id }}</td>
                                    <td style="text-align: center">{{ $register->name }}</td>
                                    <td style="text-align: center">{{ $register->email }}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm"
                                            href="{{ url('/usuario/alterar/' . $register->id) }}"><i
                                                class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger btn-sm"
                                            href="{{ url('/usuario/excluir', $register->id) }}"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a class="btn btn-success btn-lg" href="{{ url('/usuario/incluir') }}">
                        <i class="fa fa-plus-circle"> Incluir novos usuários</i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
