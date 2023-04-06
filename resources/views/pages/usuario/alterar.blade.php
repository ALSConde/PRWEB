<!-- construct basic the page -->
@extends('layout.app')

<!-- construct the alteration page -->
@section('content')
    <div class="container">
        <div class="tile">
            <div class="tile-body">
                <form>
                    @csrf
                    @include('pages.usuario.__form')
                    <div class="row mt-5">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <button type="button" id="showModal" class="btn btn-primary btn-lg">
                                <i class="fa fa-plus-circle">
                                    Alterar usuário
                                </i>
                            </button>
                            <a id="cancelar" class="btn btn-secondary btn-lg" href="{{ url('/usuario/cancelar') }}">
                                <i class="fa fa-arrow-left">
                                    Cancelar cadastro
                                </i></a>
                        </div>
                </form>
            </div>
            <x-modal-sistema />
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        $('#showModal').on('click', function(event) {
            $('#myModal').modal();
        });
        $('#btnCancelar').on('click', function(event) {
            window.location = "{{ url('/usuario/listar') }}";
        });
    </script>
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
                    window.location.href = "{{ url('/usuario/listar') }}";
                },
                error: function(data) {
                    console.log(data);
                    window.location.href = "{{ url('/usuario/listar') }}";
                }
            });
        });
    </script>
@endpush
