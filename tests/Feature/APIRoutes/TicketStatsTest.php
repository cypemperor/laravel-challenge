<?php

namespace Tests\Feature\APIRoutes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TicketStatsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_ticketStats(): void
    {
        $response = $this->get('/api/tickets/stats');

        $response->assertStatus(200);
    }
}
