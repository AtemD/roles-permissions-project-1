<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('roles')->truncate();

        // Create 3 roles: Admin, Principal and Subscriber
        Role::create(['name' => Role::ADMIN]);
        Role::create(['name' => Role::PRINCIPAL]);
        Role::create(['name' => Role::SUBSCRIBER]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
