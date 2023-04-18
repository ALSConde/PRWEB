<?php

namespace App\Http\Services;

interface AutorServiceInterface
{
    public function index($search, $perPage);
    public function create($registro);
    public function update($registro, $id);
    public function delete($id);
    public function buscar($id);
}
