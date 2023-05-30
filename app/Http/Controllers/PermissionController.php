<?php

namespace App\Http\Controllers;

use App\Models\permissao;
use App\Http\Requests\StorepermissaoRequest;
use App\Http\Requests\UpdatepermissaoRequest;
use App\Models\Permissions;

class PermissionController extends Controller
{
    // Private vars
    private $permissaoRepo;

    // constructor
    public function __construct(Permissions $permissao)
    {
        $this->permissaoRepo = $permissao;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorepermissaoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepermissaoRequest $request)
    {
        //store method
        return $this->permissaoRepo::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\permissao  $permissao
     * @return \Illuminate\Http\Response
     */
    public function show(Permissions $permissao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\permissao  $permissao
     * @return \Illuminate\Http\Response
     */
    public function edit(Permissions $permissao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepermissaoRequest  $request
     * @param  \App\Models\permissao  $permissao
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepermissaoRequest $request, Permissions $permissao)
    {
        //update method
        return $permissao->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\permissao  $permissao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permissions $permissao)
    {
        //destroy method
        return $permissao->delete();
    }
}
