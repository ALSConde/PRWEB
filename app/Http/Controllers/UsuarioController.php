<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioModel;
use App\Http\Services\UserService;
use App\Http\Services\PhotoService;

class UsuarioController extends Controller
{
    // vars
    private $userService;
    private $photoService;

    // construtor
    public function __construct(UserService $usuarioService, PhotoService $photoService)
    {
        $this->userService = $usuarioService;
        $this->photoService = $photoService;
    }

    //index usuarios
    public function index()
    {
        // $registers = user::factory()->count(10)->make();
        $registros = $this->userService->index();
        $registros = $registros['registros'];
        // $registros = $registros['registros']->items();
        // dd($registros);

        return view('pages.usuario.index', ['registros' => $registros,]);
    }

    //Incluir usuarios
    public function incluir()
    {
        return view('pages.usuario.incluir'); //retorna a view incluir
    }

    //Salvar usuarios
    public function create(UsuarioModel $request)
    {
        $registro = $request->all(); //pega todos os dados do formulario

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('storage/images'), $imageName);
        //     $registro['photo'] = asset('storage/images/' . $imageName);
        // } else {
        //     $registro['photo'] = asset('img/user.svg');
        // }
        // dd($data); //die and dump

        $registro['photo'] = $this->photoService->saveImage($request->file('photo'));
        // dd($registro);
        $data = $this->userService->create($registro); //salva no banco de dados

        return redirect()->route('usuarios.index')->with('success', $data['sucess']); //redireciona para a rota usuarios.index
    }

    // public function uploadImage(Request $request)
    // {
    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('storage/images'), $imageName);
    //         return response()->json(['success' => $imageName]);
    //     }

    //     return response('ERRO', 403);
    // }

    public function alterar($id)
    {
        $data = $this->userService->buscar($id);

        if (isset($data['fail'])) {
            return redirect()->back();
        }

        // dd($registro);

        return view('pages.usuario.alterar', ['registro' => $data['registro'],]);
    }

    public function update(UsuarioModel $request, $id)
    {
        $registro = $request->all();

        // dd($request);

        $registro['photo'] = $this->photoService->saveImage($request->file('photo'));

        $data = $this->userService->update($registro, $id);

        // dd($data);

        return redirect()->route('usuarios.index')->with('success', $data['success']);
    }

    //view excluir usuarios
    public function excluir($id)
    {
        $data = $this->userService->buscar($id);

        if (isset($data['fail'])) {
            return redirect()->back();
        }

        return view('pages.usuario.excluir', [
            'registro' => $data['registro'],
        ]);
    }

    //excluir usuarios
    public function delete($id)
    {
        $data = $this->userService->delete($id);

        return redirect()->route('usuarios.index')->with('success', $data['success']);
    }

    public function show($id)
    {
        $data = $this->userService->buscar($id);

        if (isset($data['fail'])) {
            return redirect()->back();
        }

        return view('pages.usuario.show', [
            'registro' => $data['registro'],
        ]);
    }
}
