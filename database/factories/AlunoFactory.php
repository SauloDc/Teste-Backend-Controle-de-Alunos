<?php

namespace Database\Factories;

use App\Models\Aluno;
use App\Models\Escola;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlunoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Aluno::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $genero = $this->faker->randomElement(['Masculino', 'Feminino']);
        $gender = $genero == 'Masculino' ? 'Male' : 'Female';
        return [
            'nome' => $this->faker->name($gender),
            'telefone' => $this->faker->landline,
            'email' => $this->faker->email,
            'data_nascimento' => $this->faker->dateTimeThisCentury->format('Y-m-d'),
            'genero' => $genero,
            'escola_id' => Escola::query()->inRandomOrder()->first()->id,
        ];
    }
}
