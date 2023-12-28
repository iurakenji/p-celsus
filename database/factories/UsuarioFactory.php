<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      /*  $nome = $this->faker->name(20);
        $login = $this->faker->userName(20);
        $conselho = $this->faker->randomElement(['CRF','CRM','COREN', 'CRN', '']);
        $genero = $this->faker->randomElement(['M','F','O']);
        $titulo = $this->faker->randomElement(['Farmacêutica(o)','Médica(o)','Enfermeira(o)', 'Nutricionista', 'Analista', '']);
        $ativo = $this->faker->boolean();*/
        return [/*
            'login' => $login,
            'nome' => $nome,
            'email' => fake()->unique()->safeEmail(),
            'tipo_acesso_id' => rand(1,3),
            'conselho' => $conselho,
            'registro' => rand(10000,999999),
            'genero' => $genero,
            'titulo' => $titulo,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'slug' => Str::slug($nome),
            'ativo' => $ativo,
            'remember_token' => Str::random(10),*/
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *//*
    public function unverified(): static
    {
       return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }*/
}
