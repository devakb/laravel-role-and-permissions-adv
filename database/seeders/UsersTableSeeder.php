<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(['email' => "admin@admin.com"],[
            'name' => "Admin",
            'password' => Hash::make('password'),
            'role_id' => 1,
            'approved' => 1,
        ]);

        User::updateOrCreate(['email' => "staff@staff.com"],[
            'name' => "Staff",
            'password' => Hash::make('password'),
            'role_id' => 2,
            'approved' => 1,
        ]);
    }
}
