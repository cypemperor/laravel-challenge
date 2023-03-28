<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tickets/unprocessed', [TicketController::class, 'unprocessedTickets']);
Route::get('/tickets/processed', [TicketController::class, 'processedTickets']);
Route::get('/tickets/user/{email}', [TicketController::class, 'userTickets']);

