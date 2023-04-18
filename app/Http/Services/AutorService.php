<?php

namespace App\Http\Services;

use App\Models\Autor;

class AutorService implements AutorServiceInterface
{
    private $repo;

    public function __construct(Autor $repo)
    {
        //
        $this->repo = $repo;
    }

    public function index($search, $perPage)
    {
        //
    }

    public function create($registro)
    {
        //
    }

    public function update($registro, $id)
    {
        //
    }

    public function delete($id)
    {
        //
    }

    public function buscar($id)
    {
        //
    }
}
