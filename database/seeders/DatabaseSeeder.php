<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // UsuarioSeeder::class,
            AutorSeeder::class,
            EditoraSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            ActionSeeder::class,
        ]);
    }
}
