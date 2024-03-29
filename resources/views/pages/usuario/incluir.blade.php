<!-- construct basic the page -->
@extends('layout.app')

<!-- construct the include page -->
@section('content')
    @guest
        <div class="container">
            <x-local-sistema local="Cadastro" url="/" texto="Home" />
            <div class="tile">
                <div class="tile-body">
                    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('pages.usuario.__form')
                        <div class="row mt-5">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <button class="btn btn-primary btn-lg">
                                    <i class="fa fa-plus-circle">
                                        Cadastrar-se
                                    </i>
                                </button>
                                <a id="cancelar" class="btn btn-secondary btn-lg" href="{{ url('/usuario/cancelar') }}">
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
    @else
        <div class="container">
            <x-local-sistema local="Inclusão de Usuario" url="/usuario/listar" texto="Listagem de Usuários" />
            <div class="tile">
                <div class="tile-body">
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
                                <a id="cancelar" class="btn btn-secondary btn-lg" href="{{ url('/usuario/cancelar') }}">
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
    @endguest
@endsection

@push('scripts')
    <script>
        $('#cancelar').on('click', function(event) {
            event.preventDefault();

            let __tokenCSRF = '{{ csrf_token() }}';
            let photoName = $('#photo').attr('src').split('/').pop(); // obter o nome do arquivo da imagem

            if (photoName != 'user.svg' && photoName != '') {
                let dados = JSON.stringify({
                    "photo": photoName,
                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{ url('/photo/cancel/') }}',
                    type: 'POST',
                    data: dados,
                    success: function(data) {
                        console.log(data);
                        window.location.href = "{{ url('/usuario/cancelar') }}";
                    },
                    error: function(data) {
                        console.log(data);
                        window.location.href = "{{ url('/usuario/cancelar') }}";
                    }
                });
            }
        });
    </script>
@endpush
