<?php

namespace App\Console\Commands;

use App\Models\Ticket;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CreateTicket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ticket:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a ticket with dummy data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            Ticket::factory()->create();
            return 1;
        } catch (\Exception $exception) {
            Log::debug('Create Ticket Command', ['exception' => $exception->getMessage()]);
            return 0;
        }
    }
}
