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

    public function index($search)
    {
        // dd($search);
        $registros = $this->repository
            ->where(function ($query) use ($search) {
                if ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                    $query->orWhere('email', 'like', '%' . $search . '%');
                }
            })
            ->paginate(5);

        // dd($registros);
        return (['registros' => $registros,]);
    }

    public function search($search)
    {
        $registros = $this->repository->where('name', 'like', '%' . $search . '%')->paginate(5);
        // dd($registros);

        return (['registros' => $registros,]);
    }

    //Salvar usuarios
    public function create($registro)
    {
        $this->repository->create($registro); //salva no banco de dados

        return (['sucess' => 'Registro cadastrado com sucesso',]); //redireciona para a rota usuarios.index
    }

    public function update($registro, $id)
    {
        $data = $this->repository->find($id);

        $data->update($registro);

        return (['success' => 'Registro alterado com sucesso',]);
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
