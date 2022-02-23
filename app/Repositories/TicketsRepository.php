<?php

namespace App\Repositories;

use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\Translation\t;

class TicketsRepository
{
    private $modelClass = Ticket::class;

    public function getOpenTickets()
    {
        return $this->modelClass::select('subject', 'content', 'user_name')
            ->where(['status' => 0])->get();
    }

    public function getClosedTickets()
    {
        return $this->modelClass::select('subject', 'content', 'user_name')
            ->where(['status' => 1])->get();
    }

    public function getTicketsByEmail($userEmail)
    {
        return $this->modelClass::select('subject', 'content', 'user_name')
            ->where(['user_email' => $userEmail])->get();
    }

    public function getTicketsStats()
    {
        $total = $this->modelClass::select('id')->count();
        $totalOpen = $this->modelClass::select('id')->where(['status' => 0])->count();
        $userWithMostTickets = DB::table('tickets')
            ->select('user_email', DB::raw('count(*) as tickets'))
            ->groupBy('user_email')
            ->orderBy('tickets', 'DESC')
            ->first();
        $latestUpdate = $this->modelClass::select('updated_at')
            ->where(['status' => 1])
            ->orderBy('updated_at', 'DESC')
            ->first();

        return [
            'total' => $total,
            'totalOpen' => $totalOpen,
            'userWithMostTickets' => $userWithMostTickets,
            'latestUpdate' => $latestUpdate->updated_at->toDateTimeString(),
        ];
    }
}