<?php

namespace Tests\Feature;

use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class PropertyTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testListAllProperties()
    {

        Property::factory(10)->create();

        Sanctum::actingAs(
            User::factory()->create()
        );

        $response = $this->json('get', '/properties');
        $response->assertOk();

        $this->assertCount(10, $response->original);
    }

    public function testCreateProperty()
    {
        Sanctum::actingAs(
            User::factory()->create()
        );

        $payload = [
            'email' => $this->faker->unique()->safeEmail,
            'street' => $this->faker->streetName,
            'number' => $this->faker->buildingNumber,
            'complement' => $this->faker->secondaryAddress,
            'neighborhood' => $this->faker->state,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
        ];
        $response = $this->json('post', '/property', $payload);

        $response->assertStatus(302);
        $this->assertDatabaseHas('properties', $payload);
    }
}
