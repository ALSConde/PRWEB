<!-- construct basic the page -->
@extends('layout.app')

<!-- construct the exclude page -->
@section('content')
    <div class="container">
        <div class="container">
            <div class="tile">
                <div class="tile.body">
                    <form method="POST" action="{{ url('/usuario/delete/' . $registro->id) }}">
                        @csrf
                        @include('pages.usuario.__form')
                        <div class="row mt-5">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <button class="btn btn-danger btn-lg">
                                    <i class="fa fa-trash">
                                        Excluir usuário
                                    </i>
                                </button>
                                <a class="btn btn-secondary btn-lg" href="{{ url('/usuario/cancelar') }}">
                                    <i class="fa fa-arrow-left">
                                        Cancelar exclusão
                                    </i></a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
