<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface AutorServiceInterface
{
    public function index($search, $perPage);
    public function create($registro);
    public function store(Request $request);
    public function show($id);
    public function edit($id);
    public function update(Request $request, $id);
    public function destroy($id);
    public function livrosPorAutor($id);
}
