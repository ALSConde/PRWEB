<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\AutorServiceInterface;
use App\Models\Autor;
use Illuminate\Http\Request;

class AutorRestController extends Controller
{
    // vars
    private $service;

    // construtor
    public function __construct(AutorServiceInterface $service)
    {
        $this->service = $service;
    }

    //index usuarios
    public function index(Request $request)
    {
        $search = $request->pesquisa ?? '';
        $perPage = $request->pagina ?? 5;
        $data = $this->service->index($search, $perPage);

        return response()->json([
            'registros' => $data['registros'],
        ]);
    }

    //Salvar usuarios
    public function create(Request $request, Autor $registro)
    {
        $registro = $request->all();

        $data = $this->service->create($registro); //salva no banco de dados

        return response()->json([
            'status' => 'ok',
            'success' => $data['success'],
            'registro' => $data['registro'],
        ], 200);
    }

    public function update(Autor $user, Request $request, $id)
    {
        $registro = $request->json()->all();

        $data = $this->service->update($request, $id);

        return response()->json([
            'status' => 'ok',
            'sucess' => $data['success'],
            'registro' => $data['registro'],
        ], 200);
    }

    //excluir usuarios
    public function delete($id)
    {
        $data = $this->service->delete($id);

        return response()->json(['success' => $data['success'], 'status' => 'ok',], 200);
    }

    public function show($id)
    {
        $data = $this->service->buscar($id);

        if (!empty($data['fail'])) {
            return response()->json(['status' => 'ok', 'fail' => 'registro não encontrado'], 404);
        }

        return response()->json([
            'status' => 'ok',
            'registro' => $data['registro'],
        ], 200);
    }
}
