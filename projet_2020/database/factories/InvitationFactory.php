<?php

namespace Database\Factories;

use App\Models\Invitation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InvitationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invitation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => Str::random(20),
            'expired_at' => "2021-06-30 12:00:00",
            'created_at' => now(),
            'updated_at' => now(),
            'cours_id' => $this->faker->numberBetween(1, 20),
            'user_id' => $this->faker->numberBetween(1, 100),
        ];
    }
}
