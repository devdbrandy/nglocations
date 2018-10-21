<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTest extends TestCase
{
    const TOTAL_STATES = 37;

    /**
     * @test
     * Test retrieves all states
     *
     * @return void
     */
    public function get_all_states()
    {
        $response = $this->get('/api/states');
        $response->assertStatus(200)->assertJsonCount(self::TOTAL_STATES, 'data');
    }

    /**
     * @test
     * Test retrieves a single state details
     *
     * @return void
     */
    public function get_state_details()
    {
        $state = 'lagos';
        $response = $this->get("/api/states/{$state}");
        $response
            ->assertStatus(200)
            ->assertJson([
                'code' => 'LA'
            ]);
    }

    /**
     * @test
     * Test retrieves cities in a given state
     *
     * @return void
     */
    public function get_cities_in_a_given_state()
    {
        $state = 'enugu';
        $response = $this->get("/api/states/{$state}/cities");
        $response->assertStatus(200)->assertJsonStructure(['data']);
    }

    /**
     * @test
     * Test retrieves all local government areas in a given state
     *
     * @return void
     */
    public function get_lgas_in_a_given_state()
    {
        $state = 'delta';
        $response = $this->get("/api/states/{$state}/lgas");
        $response->assertStatus(200)->assertJsonStructure(['data']);
    }
}
