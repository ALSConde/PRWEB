<!-- construct basic the page -->
@extends('layout.app')

<!-- construct the include page -->
@section('content')
    <div class="container">
        <x-local-sistema local="Inclusão de autor" url="/autor/listar" texto="Listagem de Usuários" />
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('autor.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('pages.autor.__form')
                    <div class="row mt-5">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <button class="btn btn-primary btn-lg">
                                <i class="fa fa-plus-circle">
                                    Incluir novo usuário
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

@push('scripts')
    <script>
        $('#cancelar').on('click', function(event) {
            event.preventDefault();

            let __tokenCSRF = '{{ csrf_token() }}';
            let photoName = $('#photo').attr('src').split('/').pop(); // obter o nome do arquivo da imagem

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
                    window.location.href = "{{ url('/autor/cancelar') }}";
                },
                error: function(data) {
                    console.log(data);
                    window.location.href = "{{ url('/autor/cancelar') }}";
                }
            });
        });
    </script>
@endpush
