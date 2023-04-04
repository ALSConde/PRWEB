<?php

namespace App\Http\Services;

use App\Models\User;

class UserService
{

    // Private vars
    private $repository;

    public function __construct(User $user)
    {
        $this->repository = $user;
    }

    public function index($search, $perPage)
    {
        $registros = $this->repository
            ->where(function ($query) use ($search) {
                if ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                    $query->orWhere('email', 'like', '%' . $search . '%');
                }
            })
            ->paginate($perPage)->appends(['pesquisa' => $search, 'pagina' => $perPage]);

        return (['registros' => $registros,]);
    }

    //Salvar usuarios
    public function create($registro)
    {
        // $data = $registro;
        $data = $this->repository->create($registro); //salva no banco de dados

        return ([
            'success' => 'Registro cadastrado com sucesso',
            'registro' => $data,
        ]);
    }

    public function update($registro, $id)
    {
        $data = $this->repository->find($id);

        $data->name = $registro['name'];
        $data->email = $registro['email'];

        $data->save();
        // $data->update($registro);

        return ([
            'success' => 'Registro alterado com sucesso',
            'registro' => $data,
        ]);
    }

    public function buscar($id)
    {
        $registro = $this->repository->find($id);

        if (!$registro) {
            return (['fail' => 'Registro não encontrado',]);
        } else {
            return (['registro' => $registro,]);
        }
    }

    //excluir usuarios
    public function delete($id)
    {
        $data = $this->repository->find($id);

        $data->delete();

        return (['success' => 'Registro excluido com sucesso',]);
    }
}
