<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\AutorServiceInterface;
use Exception;
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
        try {
            $search = $request->pesquisa ?? '';
            $perPage = $request->pagina ?? 5;
            $data = $this->service->index($search, $perPage);
            return response()->json([
                'registros' => $data['registros'],
                'status' => 'ok'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'erro',
                'mensagem' => $e->getMessage(),
            ], $e->getCode());
        }
    }

    //Salvar usuarios
    public function store(Request $request)
    {
        try {
            $data = $this->service->store($request); //salva no banco de dados

            return response()->json([
                'status' => 'ok',
                'success' => $data['success'],
                'registro' => $data['registro'],
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'erro',
                'mensagem' => $e->getMessage(),
            ], $e->getCode());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $this->service->update($request, $id);
            if (!empty($data['fail'])) {
                throw new Exception($data['fail'], 404);
            }
            return response()->json([
                'status' => 'ok',
                'sucess' => $data['success'],
                'registro' => $data['registro'],
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'erro',
                'mensagem' => $e->getMessage(),
            ], $e->getCode());
        }
    }

    //excluir usuarios
    public function destroy($id)
    {
        try {
            $data = $this->service->destroy($id);
            if (!empty($data['fail'])) {
                throw new Exception($data['fail'], 404);
            }
            return response()->json([
                'success' => $data['success'],
                'status' => 'ok',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'erro',
                'mensagem' => $e->getMessage(),
            ], $e->getCode());
        }
    }

    public function show($id)
    {
        try {
            $data = $this->service->show($id);

            if (!empty($data['fail'])) {
                return response()->json(['status' => 'ok', 'fail' => 'registro não encontrado'], 404);
            }
            return response()->json([
                'status' => 'ok',
                'registro' => $data['registro'],
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'erro',
                'mensagem' => $e->getMessage(),
            ], $e->getCode());
        }
    }
}
