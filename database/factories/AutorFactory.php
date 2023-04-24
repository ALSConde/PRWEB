<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Autor>
 */
class AutorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => fake()->name(),
            'apelido' => fake()->name(),
            'endereco' => fake()->address(),
            'bairro' => fake()->name(),
            'cep' => fake()->postcode(),
            'email' => fake()->unique()->safeEmail(),
            'telefone' => fake()->phoneNumber(),
        ];
    }
}
