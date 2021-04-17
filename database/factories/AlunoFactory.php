<?php

namespace Database\Factories;

use App\Models\Aluno;
use App\Models\Escola;
use App\Models\Turma;
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
        $gender = $this->faker->randomElement(['male', 'female']);
        return [
            'nome' => $this->faker->name($gender),
            'telefone' => $this->faker->landline,
            'email' => $this->faker->email,
            'data_nascimento' => $this->faker->dateTimeThisCentury,
            'genero' => $gender,
            'escola_id' => Escola::query()->inRandomOrder()->first()->id,
        ];
    }
}
