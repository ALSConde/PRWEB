<?php

namespace App\Http\Services;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorService implements AutorServiceInterface
{
    private $repo;

    public function __construct(Autor $repo)
    {
        //
        $this->repo = $repo;
    }

    public function index($search, $perPage)
    {
        $registros = $this->repo
            ->where(function ($query) use ($search) {
                if ($search) {
                    $query->where('nome', 'like', '%' . $search . '%');
                    $query->orWhere('apelido', 'like', '%' . $search . '%');
                    $query->orWhere('email', 'like', '%' . $search . '%');
                    $query->orWhere('cep', 'like', '%' . $search . '%');
                }
            })
            ->paginate($perPage);

        return (['registros' => $registros,]);
    }

    public function create($registro)
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate(
            $this->repo->rules(),
            $this->repo->feedback()
        );

        $data = $this->repo->create($request->all());

        return ([
            'success' => 'Registro incluido com sucesso',
            'registro' => $data,
        ]);
    }

    public function show($id)
    {
        //
        $data = $this->repo->find($id);

        if (!$data) {
            return (['fail' => 'Registro não localizado']);
        }

        return (['registro' => $data]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {

        $autor = $this->repo->find($id);

        if (!$autor) {
            return (['fail' => 'Registro não localizado']);
        }

        $request->validate(
            $this->repo->rules(),
            $this->repo->feedback()
        );

        $data = $autor->update($request->all());

        return ([
            'success' => 'Registro alterado com sucesso',
            'registro' => $data,
        ]);
    }

    public function destroy($id)
    {
        //
        $data = $this->repo->find($id);
        if(!$data){
            return (['fail' => 'Registro não localizado']);
        }
        $data->delete();
        return (['success' => 'Registro excluido com sucesso']);
    }

    public function buscar($id)
    {
        //
    }
}
