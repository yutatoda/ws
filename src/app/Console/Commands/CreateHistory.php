<?php

namespace App\Console\Commands;

use App\Models\History;
use Illuminate\Console\Command;

class CreateHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:history {memo}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $memo = $this->argument('memo');
        History::create([
            'memo' => $memo
        ]);

        return Command::SUCCESS;
    }
}
