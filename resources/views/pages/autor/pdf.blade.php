<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <div>
        Lista de Autores
    </div>
    <div class="container">
        <div class="container">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th style="font-weight: bold; text-align: center">id</th>
                            <th style="font-weight: bold; text-align: center">Nome</th>
                            <th style="font-weight: bold; text-align: center">Apelido</th>
                            <th style="font-weight: bold; text-align: center">Telefone</th>
                            <th style="font-weight: bold; text-align: center">E-mail</th>
                        </tr>
                        <tbody>
                            @forelse  ($registros as $registro)
                                <tr>
                                    <td style="text-align: center">{{ $registro->id }}</td>
                                    <td style="text-align: center">{{ $registro->nome }}</td>
                                    <td style="text-align: center">{{ $registro->apelido }}</td>
                                    <td style="text-align: center">{{ $registro->telefone }}</td>
                                    <td style="text-align: center">{{ $registro->email }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="text-align: center">Nenhum registro encontrado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
