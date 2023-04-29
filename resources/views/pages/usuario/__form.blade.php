@include('layout.validate')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column align-center text-center">
                    <img id="photo" class="avatar"
                        src="{{ isset($registro->photo) ? $registro->photo : asset('img/user.svg') }}">
                    <div class="mt-3">
                        <input id="photo" class="form-control" name="photo" type="file" accept="image/*">
                        <div class="fileInput">
                            <button id="upload" class="btn btn-success btn-lg upload" title="upload de fotos"
                                type="submit">
                                <i style="font-size: 1.875rem" class="fa fa-upload fa-5x"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="name" class="control-label">Nome:</label>
                    <input id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ isset($registro->name) ? $registro->name : '' }}" />
                    @error('name')
                        <span class="invalid-feedback">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="email" class="control-label">E-mail:</label>
                    <input id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ isset($registro->email) ? $registro->email : '' }}" />
                    @error('email')
                        <span class="invalid-feedback">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="password" class="control-label">Nova Senha:</label>
                    <input type="password" id="password" name="password"
                        class="form-control @error('password') is-invalid @enderror" value="" />
                    @error('password')
                        <span class="invalid-feedback">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('#upload').on('click', function(event) {
            event.preventDefault();

            let file = $('input[type=file]').get(0).files[0];
            let __tokenCSRF = '{{ csrf_token() }}';
            let formData = new FormData();
            const storagePhotos = '{{ asset('storage/images') }}';

            formData.append('photo', file);
            formData.append('_token', __tokenCSRF);

            $.ajax({
                url: '{{ url('/photo/upload') }}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                success: function(data) {
                    console.log(data);
                    $('#photo').attr('src', storagePhotos + '/' + data.success);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        })
    </script>
@endpush
