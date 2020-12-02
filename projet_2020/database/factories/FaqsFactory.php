<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Faqs;
use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;

class FaqsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Faqs::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question' => $this->faker->sentence(3, true),
            'reponse' => $this->faker->sentence(6, true),
            'module_id' => $this->faker->numberBetween(1, 100),
            'user_id' => $this->faker->numberBetween(1, 100),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
