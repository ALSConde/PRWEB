<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // vars
    private $repository;

    // construtor
    public function __construct(User $user)
    {
        $this->repository = $user;
    }

    //index usuarios
    public function index()
    {
        // $registers = user::factory()->count(10)->make();
        $registers = $this->repository->all();

        return view('pages.usuario.index', [
            'registers' => $registers
        ]);
    }

    //listar usuarios
    public function listar()
    {
        return ;
    }

    //criar usuarios
    public function criarUsuario()
    {
        return 'Criando usuarios';
    }

    //inserir usuarios
    public function inserir()
    {
        return 'Inserindo usuarios';
    }

    //mostrar usuarios
    public function mostrar()
    {
        return 'Mostrando usuarios';
    }

    //alterar usuarios
    public function alterar()
    {
        return 'Alterando usuarios';
    }

    //deletar usuarios
    public function deletar()
    {
        return 'Deletando usuarios';
    }

    //excluir usuarios
    public function excluir()
    {
        return 'Excluindo usuarios';
    }

    //consultar usuarios
    public function consultar()
    {
        return 'Consultando usuarios';
    }
}
