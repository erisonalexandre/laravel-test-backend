<?php

namespace Tests\Feature;

use App\Models\Contract;
use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ContractTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testListAllContracts()
    {

        Contract::factory(10)->create();

        Sanctum::actingAs(
            User::factory()->create()
        );

        $contracts = Contract::all();

        $this->assertCount(10, $contracts);
    }

    public function testCreateContract()
    {
        Sanctum::actingAs(
            User::factory()->create()
        );

        $payload = [
            'email' => $this->faker->unique()->safeEmail,
            'document' => $this->faker->cpf,
            'name' => $this->faker->name,
            'property_id' => Property::factory()->create()->id,
            'type' => Contract::TYPE_PERSON
        ];
        $response = $this->json('post', '/contract', $payload);
        $response->assertStatus(302);
        $this->assertDatabaseHas('contracts', $payload);
    }
}
