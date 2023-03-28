<?php

namespace Tests\Feature;

use Tests\TestCase;

class CreateCommandTest extends TestCase
{
    /**
     * Create ticket command test
     */
    public function test_createTicket(): void
    {
        $this->artisan('create:ticket')
            ->expectsOutput('Tickets Created.');
    }
}
