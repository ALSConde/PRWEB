<?php

namespace Database\Seeders;

use App\Models\Permissions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Permissions $registro)
    {
        //
        $registro->create([
            'nome' => 'User',
            'descricao' => 'Cadastro de Usuario',
        ]);

        $registro->create([
            'nome' => 'Autor',
            'descricao' => 'Cadastro de Autor',
        ]);

        $registro->create([
            'nome' => 'Editora',
            'descricao' => 'Cadastro de Editora',
        ]);

        $registro->create([
            'nome' => 'Livro',
            'descricao' => 'Cadastro de Livro',
        ]);

        $registro->create([
            'nome' => 'Role',
            'descricao' => 'Cadastro de Role',
        ]);

        $registro->create([
            'nome' => 'Permissao',
            'descricao' => 'Cadastro de Permissao',
        ]);

        $registro->create([
            'nome' => 'Action',
            'descricao' => 'Cadastro de Action',
        ]);
    }
}
