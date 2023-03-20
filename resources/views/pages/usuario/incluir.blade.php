<!-- construct basic the page -->
@extends('layout.app')

<!-- construct the include page -->
@section('content')
    <div class="container">
        <div class="container">
            <div class="tile">
                <div class="tile.body">
                    <form action="{{ url('/usuario/incluir') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('pages.usuario.__form')
                        <div class="row mt-5">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <button class="btn btn-primary btn-lg">
                                    <i class="fa fa-plus-circle">
                                        Incluir novo usuário
                                    </i>
                                </button>
                                <a class="btn btn-secondary btn-lg" href="{{ url('/usuario/cancelar') }}">
                                    <i class="fa fa-arrow-left">
                                        Cancelar cadastro
                                    </i></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
