<?php

namespace Tests\Feature\APIRoutes;

use App\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTicketsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_userTickets(): void
    {
        $response = $this->get('/api/tickets/user/test@example.com');


        $response->assertStatus(200);

        $response->assertJsonCount(1, 'data');
    }
}
