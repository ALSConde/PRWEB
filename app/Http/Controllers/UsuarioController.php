<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioModel;
use App\Http\Services\UserServiceInterface;
use App\Http\Services\PhotoService;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    // vars
    private $userService;
    private $photoService;

    // construtor
    public function __construct(UserServiceInterface $usuarioService, PhotoService $photoService)
    {
        $this->userService = $usuarioService;
        $this->photoService = $photoService;
    }

    //index usuarios
    public function index(Request $request)
    {
        $filters = $request->all();
        // dd($filters);
        $tamPagina = [5, 10, 15, 20, 30, 40];
        $search = $request->pesquisa;
        $item = $request->pagina ?? 5;
        $data = $this->userService->index($search, $item);
        $registros = $data['registros'];

        return view('pages.usuario.index', [
            'registros' => $registros,
            'tamPagina' => $tamPagina,
            'item' => $item,
            'filters' => [
                'pesquisa' => $search,
            ],
            'user' => Auth::user(),
        ]);
    }

    //Incluir usuarios
    public function incluir()
    {
        return view(
            'pages.usuario.incluir',
            [
                'user' => Auth::user(),
            ]
        ); //retorna a view incluir
    }

    //Salvar usuarios
    public function create(UsuarioModel $request)
    {
        $registro = $request->all(); //pega todos os dados do formulario

        $registro['photo'] = $this->photoService->saveImage($request->file('photo'));

        $data = $this->userService->create($registro); //salva no banco de dados

        return redirect()->route('usuarios.index')->with('success', $data['success']); //redireciona para a rota usuarios.index
    }

    public function alterar($id)
    {
        $data = $this->userService->buscar($id);

        if (isset($data['fail'])) {
            return redirect()->back();
        }

        return view('pages.usuario.alterar', [
            'registro' => $data['registro'],
            'user' => Auth::user(),
        ]);
    }

    public function update(UsuarioModel $request, $id)
    {
        $registro = $request->all();

        $registro['photo'] = $this->photoService->saveImage($request->file('photo'));

        $data = $this->userService->update($registro, $id);

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
            'user' => Auth::user(),
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

    public function atrRole($id)
    {
        $usuario = User::find($id);
        $registros = Role::paginate(5);

        return view('pages.usuario.role',[
            'registros' => $registros,
            'usuario' => $usuario,
        ]);
    }
}
