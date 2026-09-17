<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApplicationTest extends TestCase
{
    /**
     * Test that the Laravel application is running.
     */
    public function test_the_application_is_running(): void
    {
        $response = $this->get('/up');

        $response->assertStatus(200);
    }
}
