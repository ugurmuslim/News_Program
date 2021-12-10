<?php

namespace App\Console\Commands;

use App\Jobs\UpdateMostRead;
use App\Parafesor\Helper\ArticleHelper;
use Illuminate\Console\Command;

class UpdateMostReadCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:mostRead';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        UpdateMostRead::dispatchSync();
    }
}
