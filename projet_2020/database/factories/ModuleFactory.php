<?php

namespace Database\Factories;

use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModuleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Module::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'titre' => $this->faker->sentence(3, true),
            'description' => $this->faker->sentence(6, true),
            'ordre' => $this->faker->unique(true)->numberBetween(1, 100),
            'url_video' => $this->faker->url,
            'cours_id' => $this->faker->numberBetween(1, 20)
        ];
    }
}
