<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->lastName(),
            'prenom' => $this->faker->firstName(),
            'pseudo' => $this->faker->unique()->firstName() . '_pseudo',
            'admin' => $this->faker->unique(true)->numberBetween(0,1),
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '1234secret',  
            'api_token' => 'sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9',
            'remember_token' => Str::random(50),
            'register_token' => 'registerPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9',
        ];
    }
}
