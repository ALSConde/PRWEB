<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioModel;
use App\Http\Services\UserService;
use App\Http\Services\PhotoService;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioRestController extends Controller
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
    public function index(Request $request)
    {
        // dd($request->all());
        // $tamPagina = [5, 10, 15, 20, 30, 40];
        $search = $request->pesquisa;
        $item = $request->pagina ?? 5;
        $data = $this->userService->index($search, $item);
        $registros = $data['registros'];
        // dd($registros);

        return response()->json([
            'registros' => $registros,
            // 'tamPagina' => $tamPagina,
            'item' => $item,
        ]);
    }

    //Salvar usuarios
    public function create(UsuarioModel $request)
    {
        $registro = $request->all(); //pega todos os dados do formulario

        $registro['photo'] = $this->photoService->saveImage($request->file('photo'));
        // dd($registro);
        $data = $this->userService->create($registro); //salva no banco de dados

        return redirect()->route('usuarios.index')->with('success', $data['sucess']); //redireciona para a rota usuarios.index
    }

    public function update(User $user, UsuarioModel $request, $id)
    {
        $registro = $request->json()->all();

        $user->name = $registro['name'];
        $user->email = $registro['email'];

        // dd($request);

        // $registro['photo'] = $this->photoService->saveImage($request->file('photo'));

        $data = $this->userService->update($user, $id);

        // dd($data);

        return response()->json([
            'status' => 'ok',
            'sucess' => $data['sucess'],
            'registro' => $data['registro'],
        ], 200);
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

        // if (isset($data['fail'])) {
        //     return redirect()->back();
        // }

        return response()->json([
            'status' => 'ok',
            'registro' => $data['registro'],
        ], 200);
    }
}
