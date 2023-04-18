<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    public function livros()
    {
        return $this->hasMany('App\Models\Livro', 'autor_id');
    }
}
