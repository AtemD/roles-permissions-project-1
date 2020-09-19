<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('permissions')->truncate();

        // Create all the necessary permissions

        // permissions related to users
        Permission::create(['name' => Permission::CREATE_USERS]);
        Permission::create(['name' => Permission::UPDATE_USERS]);
        Permission::create(['name' => Permission::DELETE_USERS]);
        Permission::create(['name' => Permission::VIEW_USERS]);

        // permissions related to permissions
        Permission::create(['name' => Permission::CREATE_PERMISSIONS]);
        Permission::create(['name' => Permission::UPDATE_PERMISSIONS]);
        Permission::create(['name' => Permission::DELETE_PERMISSIONS]);
        Permission::create(['name' => Permission::VIEW_PERMISSIONS]);

        // permisssions related to roles
        Permission::create(['name' => Permission::CREATE_ROLES]);
        Permission::create(['name' => Permission::UPDATE_ROLES]);
        Permission::create(['name' => Permission::DELETE_ROLES]);
        Permission::create(['name' => Permission::VIEW_ROLES]);

        // permissions related to shools
        Permission::create(['name' => Permission::CREATE_SCHOOLS]);
        Permission::create(['name' => Permission::UPDATE_SCHOOLS]);
        Permission::create(['name' => Permission::DELETE_SCHOOLS]);
        Permission::create(['name' => Permission::VIEW_SCHOOLS]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
