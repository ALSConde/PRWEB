<?php

namespace App\Http\Controllers;

use App\Models\permissao;
use App\Http\Requests\StorepermissaoRequest;
use App\Http\Requests\UpdatepermissaoRequest;

class PermissaoController extends Controller
{
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\permissao  $permissao
     * @return \Illuminate\Http\Response
     */
    public function show(permissao $permissao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\permissao  $permissao
     * @return \Illuminate\Http\Response
     */
    public function edit(permissao $permissao)
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
    public function update(UpdatepermissaoRequest $request, permissao $permissao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\permissao  $permissao
     * @return \Illuminate\Http\Response
     */
    public function destroy(permissao $permissao)
    {
        //
    }
}
