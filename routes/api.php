<?php

use App\Http\Controllers\TicketsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get(
    '/tickets/open',
    [TicketsController::class, 'getOpenTickets']
)->name('getOpenTickets');

Route::get(
    '/tickets/closed',
    [TicketsController::class, 'getClosedTickets']
)->name('getClosedTickets');

Route::get(
    '/users/{email}/tickets',
    [TicketsController::class, 'getTicketsByEmail']
)->name('getTicketsByEmail');

Route::get(
    '/stats',
    [TicketsController::class, 'getTicketsStats']
)->name('getTicketsStats');
