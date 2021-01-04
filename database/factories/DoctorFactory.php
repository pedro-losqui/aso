<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'   =>    1,
            'name'      =>    $this->faker->name,
            'crm'       =>    $this->faker->ean8,
            'uf'        =>    $this->faker->stateAbbr,
        ];
    }
}
