<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'journal-create',
            'journal-update',
            'journal-delete'
        ];

        foreach($permissions as $permission){
            Permission::create(['name'=>$permission]);
        }

        $permissions = [
            'user-show',
            'user-create',
            'user-update',
            'user-delete'
        ];

        foreach($permissions as $permission){
            Permission::create(['name'=>$permission]);
        }
    }
}
