<?php

namespace App\Http\Controllers;

use App\Exports\AutorsExport;
use App\Models\Autor;
use App\Http\Services\AutorServiceInterface;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

    public function store(Request $request)
    {
        //
        $data = $this->service->store($request);
        return redirect()->route('autor.index')->with('success', $data['success']);
    }

    public function show(Autor $autor)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
        $data = $this->service->update($request, $id);
        return redirect()->route('autor.index')->with('success', $data['success']);
    }

    public function destroy($id)
    {
        //
    }

    public function export($extensao)
    {
        //
        if (in_array($extensao, ['xlsx', 'csv', 'pdf'])) {
            return Excel::download(new AutorsExport, 'autores.' . $extensao);
        }

        return redirect()->route('autor.index')->with('error', 'Extensão não permitida!');
    }
}
