<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            "user_can_read",
            "user_can_approve",
            "user_can_create",
            "user_can_update",
            "user_can_delete",

            "role_can_read",
            "role_can_create",
            "role_can_update",
            "role_can_delete",
        ];

        foreach($permissions as $permission){
            Permission::updateOrCreate(['name' => $permission]);
        }
    }
}
