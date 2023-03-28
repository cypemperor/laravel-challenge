<?php

namespace App\Console\Commands;

use App\Models\Ticket;
use Illuminate\Console\Command;

class CreateTicket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:ticket';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Ticket Command';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Ticket::factory(5)->create();

        $this->info('Tickets Created.');
    }
}
