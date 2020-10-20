<?php

namespace Database\Factories;

use App\Models\Contract;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contract::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'document' => $this->faker->cpf,
            'name' => $this->faker->name,
            'property_id' => Property::factory(),
            'type' => $this->faker->randomElement(array_flip(Contract::TYPES))
        ];
    }
}
