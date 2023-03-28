<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $userTickets = $user->tickets()->paginate(10);

        if ($userTickets->isEmpty()) {
            return response()->json(['message' => 'There is no ticket created by the email provided.'], 404);
        }

        return response()->json($userTickets);
    }

    public function ticketStats()
    {

        $totalTickets = Ticket::all()->count();

        $totalUnprocessedTickets = Ticket::where('ticket_status', false)->count();

        $userWithMostTickets = User::withCount('tickets')->orderByDesc('tickets_count')->limit(1)->first();

        $lastProcessedTicketTime = Ticket::orderBy('updated_at', 'DESC')->pluck('updated_at')->first();

        return response()->json([
            'ticket_total' => $totalTickets,
            'unprocessed_ticket_total' =>  $totalUnprocessedTickets,
            'user_with_most_tickets' => $userWithMostTickets->name,
            'ticket_last_processed_at' => $lastProcessedTicketTime
        ]);
    }
}
