<?php

namespace App\Console\Commands;

use App\Parafesor\Youtube\YoutubeCrawler;
use Illuminate\Console\Command;

class ResetOpcache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:opcache';

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
        opcache_reset();
    }
}
