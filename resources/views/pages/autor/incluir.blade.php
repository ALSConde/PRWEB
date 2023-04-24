<!-- construct basic the page -->
@extends('layout.app')

<!-- construct the include page -->
@section('content')
    <div class="container">
        <x-local-sistema local="Inclusão de autor" url="/autor/" texto="Listagem de autores" />
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('autor.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('pages.autor.__form')
                    <div class="row mt-5">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <button class="btn btn-primary btn-lg">
                                <i class="fa fa-plus-circle">
                                    Incluir novo autor
                                </i>
                            </button>
                            <a id="cancelar" class="btn btn-secondary btn-lg" href="{{ route('autor.index') }}">
                                <i class="fa fa-arrow-left">
                                    Cancelar cadastro
                                </i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
