<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigTest extends TestCase
{
    /**
     * Key not available 
     *
     * @return void
     */
    public function test_key_unavailable()
    {
        $response = $this->get('/getConfig/nokey');

        $response->assertStatus(404);
    }
    /**
     * Key available 
     *
     * @return void
     */
    public function test_key_available()
    {
        $response = $this->get('/getConfig/database.username');

        $response->assertStatus(200);
    }
}
