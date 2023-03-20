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

        // dd($registers);

        return view('pages.usuario.index', [
            'registers' => $registers,
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

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/images'), $imageName);
            $data['photo'] = asset('storage/images/' . $imageName);
        } else {
            $data['photo'] = asset('img/user.svg');
        }
        // dd($data); //die and dump

        $this->repository->create($data); //salva no banco de dados

        return redirect()->route('usuarios.index')->with('success', 'Registro cadastrado com sucesso'); //redireciona para a rota usuarios.index
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/images'), $imageName);
            return response()->json(['success' => $imageName]);
        }

        return response('ERRO', 403);
    }

    public function alterar($id)
    {
        $registro = $this->repository->find($id);

        if (!$registro) {
            return redirect()->back()->with('fail', 'Registro não encontrado');
        }

        // dd($registro);

        return view('pages.usuario.alterar', [
            'registro' => $registro
        ]);
    }

    public function update(UsuarioModel $request, $id)
    {
        $registro = $request->all();
        
        // dd($request);

        $data = $this->repository->find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/images'), $imageName);
            $registro['photo'] = asset('storage/images/' . $imageName);
        }

        // dd($data);
        $data->update($registro);

        // dd($data);

        return redirect()->route('usuarios.index')->with('success', 'Registro alterado com sucesso');
    }

    //view excluir usuarios
    public function excluir($id)
    {
        $registro = $this->repository->findOrFail($id);

        if (!$registro) {
            return redirect()->back()->with('fail', 'Registro não encontrado');
        }

        return view('pages.usuario.excluir', [
            'usuario' => $registro,
        ]);
    }

    //excluir usuarios
    public function delete(UsuarioModel $request, $id)
    {
        $registro = $request->all();

        $data = $this->repository->find($id);

        $data->delete($registro);

        return redirect()->route('usuarios.index')->with('success', 'Registro excluido com sucesso');
    }
}
