<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Permissions;
use App\Models\Role;
use App\Models\RolePermissao;
use Illuminate\Http\Request;
use DB;

class RolePermissaoController extends Controller
{
    private $repository;

    public function __construct(RolePermissao $rolePermissao)
    {
        $this->repository = $rolePermissao;
    }

    public function showPermissoes($id)
    {
        $role = Role::find($id);
        $permissoes = Permissions::paginate(5);
        $actions = Action::all();
        $rolePermissoes = RolePermissao::where('role_id', $id)->get();

        return view('pages.roles.permissao', compact('role', 'permissoes', 'actions', 'rolePermissoes'));
    }
}
