<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
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
        $userTickets = Ticket::where('user_email', $email)->paginate(10);

        if ($userTickets->isEmpty()) {
            return response()->json(['message' => 'There is no ticket created by the email provided.'], 404);
        }

        return response()->json($userTickets);
    }

    public function ticketStats()
    {
        $totalTickets = Ticket::all()->count();

        $totalUnprocessedTickets = Ticket::where('ticket_status', false)->count();

        $highestUserWithEmail = Ticket::select('user_email', DB::raw('count(*) as total'))
            ->groupBy('user_email')
            ->orderByDesc('total')
            ->first();

        $highestUserName = Ticket::where('user_email', $highestUserWithEmail->user_email)->pluck('user_name')->first();

        $lastProcessedTicketTime = Ticket::orderBy('updated_at', 'DESC')->pluck('updated_at')->first();

        return response()->json([
            'ticket_total' => $totalTickets,
            'unprocessed_ticket_total' =>  $totalUnprocessedTickets,
            'user_with_most_tickets' => $highestUserName,
            'ticket_last_processed_at' => $lastProcessedTicketTime
        ]);
    }
}
