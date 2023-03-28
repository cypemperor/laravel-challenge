<?php

namespace App\Console\Commands;

use App\Models\Ticket;
use Illuminate\Console\Command;

class ProcessTicket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process:ticket';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process Ticket Command';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $tickets = Ticket::where('ticket_status', '=', false)->orderBy('created_at', 'DESC')->take(5)->get();

        foreach ($tickets as $ticket) {
            $ticket->ticket_status = true;
            $ticket->save();
        }

        $this->info('Tickets processed.');
    }
}
