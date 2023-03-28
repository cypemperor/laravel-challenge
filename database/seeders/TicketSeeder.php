<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ticket::create([
            'subject' => 'test subject',
            'content' => 'test content',
            'user_name' => 'test user',
            'user_email' => 'test@example.com'
        ]);

        Ticket::factory(20)->create();
    }
}
