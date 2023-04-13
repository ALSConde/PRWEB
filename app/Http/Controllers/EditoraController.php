<?php

namespace App\Http\Controllers;

use App\Models\Editora;
use App\Http\Requests\StoreEditoraRequest;
use App\Http\Requests\UpdateEditoraRequest;

class EditoraController extends Controller
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
     * @param  \App\Http\Requests\StoreEditoraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEditoraRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Editora  $editora
     * @return \Illuminate\Http\Response
     */
    public function show(Editora $editora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Editora  $editora
     * @return \Illuminate\Http\Response
     */
    public function edit(Editora $editora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEditoraRequest  $request
     * @param  \App\Models\Editora  $editora
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEditoraRequest $request, Editora $editora)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Editora  $editora
     * @return \Illuminate\Http\Response
     */
    public function destroy(Editora $editora)
    {
        //
    }
}
