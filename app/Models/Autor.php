<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    public function rules()
    {
        return [
            'nome' => 'required',
            'apelido' => 'required',
            'endereco' => 'required',
            'bairro' => 'required',
            'cep' => 'required',
            'email' => 'required',
            'telefone' => 'required',
        ];
    }

    public function feedback()
    {
        return [
            'nome' => 'O campo :attribute é obrigatório',
            'apelido' => 'O campo :attribute é obrigatório',
            'endereco' => 'O campo :attribute é obrigatório',
            'bairro' => 'O campo :attribute é obrigatório',
            'cep' => 'O campo :attribute é obrigatório',
            'email' => 'O campo :attribute é obrigatório',
            'telefone' => 'O campo :attribute é obrigatório',
        ];
    }

    public function livros()
    {
        return $this->hasMany('App\Models\Livro', 'autor_id');
    }
}
