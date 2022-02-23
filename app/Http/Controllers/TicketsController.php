<?php

namespace App\Http\Controllers;

use App\Repositories\TicketsRepository;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    /**
     * @var TicketsRepository
     */
    private $repository;

    public function __construct()
    {
        $this->repository = new TicketsRepository();
    }

    public function getOpenTickets()
    {
        return $this->repository->getOpenTickets();
    }

    public function getClosedTickets()
    {
        return $this->repository->getClosedTickets();
    }

    public function getTicketsByEmail($userEmail)
    {
        return $this->repository->getTicketsByEmail($userEmail);
    }

    public function getTicketsStats()
    {
        return $this->repository->getTicketsStats();
    }
}
