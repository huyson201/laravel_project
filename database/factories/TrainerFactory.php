<?php

namespace Database\Factories;

use App\Models\Trainer;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trainer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'trainer_name'      => $this->faker->name(),
            'trainer_phone'     => $this->faker->phoneNumber,
            'trainer_address'   => $this->faker->address,
            'company_id'        => $this->faker->numberBetween(1, 20),
        ];
    }
}
