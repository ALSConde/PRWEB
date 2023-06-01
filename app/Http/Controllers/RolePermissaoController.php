<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Permissao;
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


    public function showPermissoes($id){

        $role = Role::find($id);
        $permissao = Permissao::paginate(5);
        $actions = Action::all();

        return view('role.permissao',[
          'role'=>$role,
          'actions'=>$actions,
          'registros'=>$permissao,
        ]);
    }


    



    

}
