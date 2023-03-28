<?php

namespace Tests\Feature\APIRoutes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UnprocessedTicketsTest extends TestCase
{
    /**
     * Test API Endpoint for unprocessed tickets.
     */
    public function test_unprocessedTicketRoutes(): void
    {
        $response = $this->get('/api/tickets/unprocessed');

        $response->assertStatus(200);
    }
}
