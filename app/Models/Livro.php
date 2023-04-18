<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    public function autor()
    {
        return $this->belongsTo('App\Models\Autor', 'autor_id');
    }

    public function editora()
    {
        return $this->belongsTo('App\Models\Editora', 'editora_id');
    }
}
