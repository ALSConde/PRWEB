<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioModel;
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
        return view('pages.usuario.incluir'); //retorna a view incluir
    }

    //Salvar usuarios
    public function create(UsuarioModel $request)
    {
        $data = $request->all(); //pega todos os dados do formulario

        // dd($data); //die and dump

        $this->repository->create($data); //salva no banco de dados

        return redirect()->route('usuarios.index'); //redireciona para a rota usuarios.index
    }

    public function uploadImage(Request $request){
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            return response()->json(['success'=>$imageName]);
        }

        return response('ERRO', 403);
    }

    public function buscar($id)
    {
        $registro = $this->repository->find($id);

        if (!$registro) {
            return redirect()->back();
        }

        return view('pages.usuario.alterar', [
            'registro' => $registro
        ]);
    }

    //view alterar usuarios
    public function alterar($id)
    {
        $usuario = $this->repository->findOrFail($id);

        return view('pages.usuario.alterar', [
            'usuario' => $usuario,
        ]);
    }

    public function alterarUsuario($id, Request $request)
    {
        $usuario = $this->repository->findOrFail($id);
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->password = $request->input('password');
        $usuario->save();

        return redirect()->route('usuarios.index');
    }

    //view excluir usuarios
    public function excluir($id)
    {
        $usuario = $this->repository->findOrFail($id);

        return view('pages.usuario.excluir', [
            'usuario' => $usuario,
        ]);
    }

    //excluir usuarios
    public function remover($id)
    {
        $cliente = $this->repository->findOrFail($id);
        $cliente->delete();
        return redirect()->route('usuarios.index');
    }
}
