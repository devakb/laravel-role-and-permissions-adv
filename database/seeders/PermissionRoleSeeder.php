<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user_permissions = Permission::where('name', 'ilike', '%_read')->pluck('id');
        Role::find(2)->permissions()->sync($user_permissions);
    }
}
