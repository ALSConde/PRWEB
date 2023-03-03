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

    //Salvar usuarios
    public function create(Request $request)
    {
        $usuario = new User();
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->password = $request->input('password');
        $usuario->save();

        return redirect()->route('usuarios.index');
    }

    //view alterar usuarios
    public function alterar($id)
    {
        $usuario = User::findOrFail($id);

        return view('pages.usuario.alterar', [
            'usuario' => $usuario,
        ]);
    }

    public function alterarUsuario($id, Request $request){
        $usuario = User::findOrFail($id);
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->password = $request->input('password');
        $usuario->save();

        return redirect()->route('usuarios.index');
    }

    //view excluir usuarios
    public function excluir($id)
    {
        $usuario = User::findOrFail($id);

        return view('pages.usuario.excluir', [
            'usuario' => $usuario,
        ]);
    }

    //excluir usuarios
    public function remover($id)
    {
        $cliente = User::findOrFail($id);
        $cliente->delete();
        return redirect()->route('usuarios.index');
    }
}
