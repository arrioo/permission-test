<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AssignPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::find(2);
        $permissions = [
            'journal-update',
            'journal-delete',
            'user-show',
            'user-create',
            'user-update'
        ];

        $role->givePermissionTo($permissions);

        $role = Role::whereName('user')->first();
        $permissions = [
            'journal-create'
        ];

        $role->givePermissionTo($permissions);
    }
}
