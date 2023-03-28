<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Http\Request;

class UserService
{

    // Private vars
    private $repository;
    private $photoService;

    public function __construct(User $user, PhotoService $photoService)
    {
        $this->repository = $user;
        $this->photoService = $photoService;
    }

    public function index()
    {
        $registros = $this->repository->all();
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
        $this->photoService->removeImage($data->photo);
        $data->delete();

        return (['success' => 'Registro excluido com sucesso',]);
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }
}
