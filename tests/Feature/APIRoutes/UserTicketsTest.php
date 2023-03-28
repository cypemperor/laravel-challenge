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
        $randomTicket = Ticket::inRandomOrder()->first();

        $response = $this->get("/api/tickets/user/{$randomTicket->user->email}");

        $response->assertStatus(200);
    }
}
