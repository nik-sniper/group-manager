<?php

namespace Database\Factories\Groups;

use App\Models\Groups\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Group::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'provider_id' => $this->faker->numberBetween(1000, 100000),
            'provider' => $this->faker->randomElement(Group::SUPPORTED_GROUPS)
        ];
    }
}
