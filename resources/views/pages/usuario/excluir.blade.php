<!-- construct basic the page -->
@extends('layout.app')

<!-- construct the include page -->
@section('content')
    <div class="container">
        <div class="container">
            {{-- pesquisa --}}
        </div>
        <div class="container">
            {{-- mensagem --}}
        </div>
        <div class="container">
            <div class="tile">
                <div class="tile.body">
                    <form method="POST" action="{{ url('/usuario/remover/' . $usuario->id) }}">
                        @csrf
                        @include('pages.usuario.__form')
                        <button class="btn btn-primary btn-lg">
                            <i class="fa fa-trash">
                                Excluir usuário
                            </i>
                        </button>
                        <a class="btn btn-secondary btn-lg" href="{{ url('/usuario/cancelar') }}">
                            <i class="fa fa-arrow-left">
                                Cancelar exclusão
                            </i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
