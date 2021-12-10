<?php

namespace App\Console\Commands;

use App\Jobs\UserCreated;
use App\Models\User;
use Illuminate\Console\Command;

class usercreatedCoomand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:created';

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
        UserCreated::dispatch(User::inRandomOrder()->first()->toArray());
    }
}
