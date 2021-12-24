<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleMaking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:assignment';

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
        $roleEditor = Role::create(['name' => 'Yazar']);
        $roleAssigner = Role::create(['name' => 'Editor']);
        $roleAdmin = Role::create(['name' => 'Yönetici']);

        $permissionEditor = Permission::create(['name' => 'edit articles']);
        $permissionEditor2 = Permission::create(['name' => 'create articles']);
        $permissionAssigner = Permission::create(['name' => 'assign articles']);

        $roleEditor->givePermissionTo($permissionEditor);
        $roleEditor->givePermissionTo($permissionEditor2);
        $roleAssigner->givePermissionTo($permissionAssigner);

        $user1 = User::find(1);
        $user1->assignRole('Editor');

        $user2 = User::find(2);
        $user2->assignRole('Yönetici');


        $user5 = User::find(5);

        $user5->assignRole('Editor');

    }
}
