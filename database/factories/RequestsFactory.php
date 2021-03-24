<?php

namespace Database\Factories;

use App\Models\Requests;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
class RequestsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Requests::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'id' => $this->faker->uuid,
          'user_id' => User::first()->id,
          'filename' => $this->faker->lastName . ".stl",
          'status' => $this->faker->randomElement($array = array('printing', 'approved', 'canceled', 'rejected', 'submitted'))
        ];
    }
}
