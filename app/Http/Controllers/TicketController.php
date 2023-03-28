<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function unprocessedTickets()
    {
        $unprocessedTickets = Ticket::where('ticket_status', false)->paginate(10);

        return response()->json($unprocessedTickets);
    }

    public function processedTickets()
    {
        $unprocessedTickets = Ticket::where('ticket_status', true)->paginate(10);

        return response()->json($unprocessedTickets);
    }

    public function userTickets(string $email)
    {
        $userTickets = Ticket::where('user_email', $email)->paginate(10);

        if ($userTickets->isEmpty()) {
            return response()->json(['message' => 'There is no ticket created by the email provided.'], 404);
        }

        return response()->json($userTickets);
    }
}
