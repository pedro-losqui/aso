<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'   =>    1,
            'cpf'       =>    $this->faker->creditCardNumber,
            'name'      =>    $this->faker->name,
            'born_date' =>    $this->faker->date,
            'gender'    =>    $this->faker->titleMale,
        ];
    }
}
