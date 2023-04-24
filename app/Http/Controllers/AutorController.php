<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Http\Requests\StoreAutorRequest;
use App\Http\Requests\UpdateAutorRequest;
use App\Http\Services\AutorServiceInterface;
use Illuminate\Http\Request;

class AutorController extends Controller
{

    private $service;

    public function __construct(AutorServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        // dd($filters);
        $tamPagina = [5, 10, 15, 20, 30, 40];
        $search = $request->pesquisa;
        $item = $request->pagina ?? 5;
        $data = $this->service->index($search, $item);
        $registros = $data['registros'];

        return view('pages.autor.index', [
            'registros' => $registros,
            'tamPagina' => $tamPagina,
            'item' => $item,
            'filters' => [
                'pesquisa' => $search,
            ],
        ]);
    }

    public function create()
    {
        //
        return view('pages.autor.incluir');
    }

    public function delete($id)
    {
        //
    }

    public function store(StoreAutorRequest $request)
    {
        //
    }

    public function show(Autor $autor)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(UpdateAutorRequest $request, Autor $autor)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
