<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTest extends TestCase
{
    /**
     * @test
     * Test retrieves all states.
     *
     * @return void
     */
    public function get_all_states()
    {
        $response = $this->get('/api/v1/states');
        $response->assertStatus(200)->assertJsonCount(37);
    }

    /**
     * @test
     * Test retrieves a single state details.
     *
     * @return void
     */
    public function get_state_details()
    {
        $state = 'lagos';
        $response = $this->get("/api/v1/states/{$state}");
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'code',
                'name',
                'capital',
                'alias',
                'zone',
                'latitude',
                'longitude',
            ]);
    }

    /**
     * @test
     * Test retrieves cities in a given state.
     *
     * @return void
     */
    public function get_cities_in_a_given_state()
    {
        $state = 'enugu';
        $response = $this->get("/api/v1/states/{$state}/cities");
        $response->assertStatus(200);
    }

    /**
     * @test
     * Test retrieves all local government areas in a given state.
     *
     * @return void
     */
    public function get_lgas_in_a_given_state()
    {
        $state = 'delta';
        $response = $this->get("/api/v1/states/{$state}/lgas");
        $response->assertStatus(200);
    }

    /**
     * @test
     * Test retrieves state capital.
     *
     * @return void
     */
    public function get_state_capital()
    {
        $state = 'delta';
        $response = $this->get("/api/v1/states/{$state}?capital");
        $response
            ->assertStatus(200)
            ->assertExactJson(['Asaba']);
    }

    /**
     * @test
     * Test retrieves all states with custom params.
     *
     * @return void
     */
    public function get_all_states_with_custom_params()
    {
        $params = ['capital', 'lgas', 'cities', 'total'];

        foreach ($params as $param) {
            $response = $this->get("/api/v1/states?{$param}");
            $response->assertStatus(200);
        }
    }

    /**
     * @test
     * Test retrieves all local government areas.
     *
     * @return void
     */
    public function get_all_lgas()
    {
        $response = $this->get('/api/v1/lgas');
        $response->assertStatus(200);
    }

    /**
     * @test
     * Test retrieves local government area details.
     *
     * @return void
     */
    public function get_lga_details()
    {
        $lga = 'aba-north';
        $response = $this->get("/api/v1/lgas/{$lga}");
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'name',
                'alias',
                'latitude',
                'longitude',
            ]);
    }

    /**
     * @test
     * Test retrieves local government area details with custom state param.
     *
     * @return void
     */
    public function get_lga_details_with_custom_state_param()
    {
        $lga = 'aba-north';
        $response = $this->get("/api/v1/lgas/{$lga}?state");
        $response
            ->assertStatus(200)
            ->assertJsonStructure(['state']);
    }
}
