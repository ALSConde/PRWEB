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
        $search = $request->pesquisa ?? '';
        $perPage = $request->pagina ?? 5;
        $data = $this->userService->index($search, $perPage);

        return response()->json([
            'registros' => $data['registros'],
        ]);
    }

    //Salvar usuarios
    public function create(UsuarioModel $request, User $registro)
    {
        $registro = $request->all();

        // $registro['photo'] = $this->photoService->saveImage($request->file('photo'));

        $data = $this->userService->create($registro); //salva no banco de dados

        return response()->json([
            'status' => 'ok',
            'success' => $data['success'],
            'registro' => $data['registro'],
        ], 200);
    }

    public function update(User $user, UsuarioModel $request, $id)
    {
        $registro = $request->json()->all();

        $user->name = $registro['name'];
        $user->email = $registro['email'];

        // $registro['photo'] = $this->photoService->saveImage($request->file('photo'));

        $data = $this->userService->update($user, $id);

        return response()->json([
            'status' => 'ok',
            'sucess' => $data['success'],
            'registro' => $data['registro'],
        ], 200);
    }

    //excluir usuarios
    public function delete($id)
    {
        $data = $this->userService->delete($id);

        return response()->json(['success' => $data['success'], 'status' => 'ok',], 200);
    }

    public function show($id)
    {
        $data = $this->userService->buscar($id);

        if (!empty($data['fail'])) {
            return response()->json(['status' => 'ok', 'fail' => 'registro não encontrado'], 404);
        }

        return response()->json([
            'status' => 'ok',
            'registro' => $data['registro'],
        ], 200);
    }
}
