<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private $roleRepo;

    public function __construct(Role $role)
    {
        $this->roleRepo = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->roleRepo::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return $this->roleRepo::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
        $dataUpdate = $this->roleRepo::find($role->id);
        return $dataUpdate->update($request->all());;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        return $this->roleRepo::destroy($role->id);
    }

    public function saveRole(Request $request)
    {
        $user_id = $request->input('user_id');

        $user = User::find($user_id);

        $registros = $request['registros'];

        if ($registros != null) {
            for ($i = 0; $i < sizeof($registros); $i++) {
                $role = $this->roleRepo->find($registros[$i]);

                if (!$user->existeRole($role->id)) {
                    $user->roles()->attach($role);
                }
            }
            return redirect()->back()->with('success', 'Roles adicionadas com sucesso!');
        }

        return redirect()->back()->with('fail', 'Nenhuma role foi selecionada!');
    }

    public function destroyRole($user_id, $role_id)
    {
        $user = User::find($user_id);
        $role = Role::find($role_id);

        $user->roles()->detach($role);

        return redirect()->back()->with('success', 'Role removida com sucesso!');
    }
}
