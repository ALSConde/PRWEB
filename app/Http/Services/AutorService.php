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
        $request->validate($this->repo->rules(), $this->repo->rules());

        $data = $this->repo->create($request->all());
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->repo->rules(), $this->repo->rules());

        $autor = $this->repo->find($id);

        $data = $autor->update($request->all());
    }

    public function delete($id)
    {
        //
    }

    public function buscar($id)
    {
        //
    }
}
