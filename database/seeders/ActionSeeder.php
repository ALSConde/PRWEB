<?php

namespace Database\Seeders;

use App\Models\Action;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Action $registro)
    {
        //
        $registro->create([
            'nome' => 'Listar',
            'descricao' => 'Listagem dos dados',
        ]);

        $registro->create([
            'nome' => 'Incluir',
            'descricao' => 'Incluir dados no sistema',
        ]);

        $registro->create([
            'nome' => 'Editar',
            'descricao' => 'Editar dados no sistema',
        ]);

        $registro->create([
            'nome' => 'Exibir',
            'descricao' => 'Visualizar dados de um registro',
        ]);

        $registro->create([
            'nome' => 'destroy',
            'descricao' => 'Deletar dados do sistema',
        ]);
    }
}
