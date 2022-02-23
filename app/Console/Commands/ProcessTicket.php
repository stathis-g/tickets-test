<?php

namespace App\Console\Commands;

use App\Models\Ticket;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ProcessTicket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ticket:process-oldest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process the oldest ticket';

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
            $oldestTicket = Ticket::select('id')->orderBy('created_at', 'asc')->where(['status' => 0])->first();
            $oldestTicket->status = 1;
            $oldestTicket->updated_at = \Carbon\Carbon::now();
            $oldestTicket->save();
        } catch (\Exception $exception) {
            Log::debug('Process Ticket Command', ['exception' => $exception->getMessage()]);
            return 0;
        }
    }
}
