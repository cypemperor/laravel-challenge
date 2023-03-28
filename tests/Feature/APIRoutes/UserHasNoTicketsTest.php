<?php

namespace Tests\Feature\APIRoutes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserHasNoTicketsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_userHasNoTickets(): void
    {
        $response = $this->get('/api/tickets/user/test@test.com');

        $response->assertStatus(404);
        $response->assertJson([
            'message' => 'There is no ticket created by the email provided.'
        ]);
    }
}
