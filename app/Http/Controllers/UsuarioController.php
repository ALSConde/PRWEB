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

    //Incluir usuarios
    public function incluir()
    {
        return view('pages.usuario.incluir');
    }

    //alterar usuarios
    public function alterar()
    {
        return view('pages.usuario.alterar');
    }

    //Excluir usuarios
    public function excluir()
    {
        return view('pages.usuario.excluir');
    }
}
