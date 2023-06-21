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
            'username'        => $this->faker->username,
            'first_name'        => $this->faker->first_name,
            'middle_name'        => $this->faker->middle_name,
            'last_name'         => $this->faker->last_name,
            'email'             => $this->faker->email,
            'contact_number' => $this->faker->contact_number,
            'user_role_id' => $this->faker->user_role_id,
            'avatar' => $this->avatar,
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token'    => Str::random(10),
        ];
    }
}
