<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function unprocessedTickets()
    {
        $unprocessedTickets = Ticket::where('ticket_status', false)->get();

        return response()->json($unprocessedTickets);
    }

    public function processedTickets()
    {
        $unprocessedTickets = Ticket::where('ticket_status', true)->get();

        return response()->json($unprocessedTickets);
    }

    public function userTickets(string $email)
    {
        $userTickets = Ticket::where('user_email', $email)->get();

        return response()->json($userTickets);
    }
}
