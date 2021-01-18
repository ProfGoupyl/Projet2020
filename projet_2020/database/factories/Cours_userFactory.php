<?php

namespace Database\Factories;

use App\Models\Cours_user;
use Illuminate\Database\Eloquent\Factories\Factory;

class Cours_userFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cours_user::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'start_at' => "2020-09-04 09:00:00",
            'end_at' => "2021-06-30 12:00:00",
            'created_at' => now(),
            'updated_at' => now(),
            'cours_id' => $this->faker->numberBetween(1, 20),
            'user_id' => $this->faker->numberBetween(1, 100),
        ];
    }
}
