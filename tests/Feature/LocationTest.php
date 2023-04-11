<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LocationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_locations(): void
    {
        $response = $this->get('api/locations');

        $response->assertStatus(200);
    }
}
