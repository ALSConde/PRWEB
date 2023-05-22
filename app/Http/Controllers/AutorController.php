<?php

namespace App\Http\Controllers;

use App\Exports\AutorsExport;
use App\Models\Autor;
use App\Http\Services\AutorServiceInterface;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\PDF;

class AutorController extends Controller
{
    public function __construct(private AutorServiceInterface $service, private PDF $pdfService)
    {
        $this->middleware('role:admin|editor|user|guest');
        // $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // dd($request->user()->can('viewAny'));
        $this->authorize('viewAny');
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
        //Exporta para Excel, CSV e PDF
        if (in_array($extensao, ['xlsx', 'csv'])) {
            return Excel::download(new AutorsExport, 'autores.' . $extensao);
        }

        return redirect()->route('autor.index')->with('error', 'Extensão não permitida!');
    }

    //Exporta para PDF
    public function exportar()
    {
        $registros = Autor::all();
        $pdf = $this->pdfService->loadView('pages.autor.pdf', ['registros' => $registros]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('autores.pdf');
    }

    //Retorna os livros de um autor
    public function livrosPorAutor($id)
    {
        $registros = $this->service->livrosPorAutor($id);

        if (count($registros) == 0) {
            return redirect()->route('autor.index')->with('fail', 'Autor selecionado não possui livros cadastrados!');
        }

        $data = $this->service->show($id);
        $registro = $data['registro'];

        return view('pages.autor.livros', [
            'registros' => $registros,
            'nome' => $registro->nome,
        ]);
    }
}
