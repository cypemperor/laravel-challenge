<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProcessTicketCommandTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_processTicket(): void
    {
        $this->artisan('process:ticket')
            ->expectsOutput('Tickets processed.');
    }
}
