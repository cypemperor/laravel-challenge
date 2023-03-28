<?php

namespace Tests\Feature\APIRoutes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProcessedTicketsTest extends TestCase
{
    /**
     * Test API Endpoint for processed tickets.
     */
    public function test_processedTickets(): void
    {
        $response = $this->get('/api/tickets/processed');

        $response->assertStatus(200);
    }
}
