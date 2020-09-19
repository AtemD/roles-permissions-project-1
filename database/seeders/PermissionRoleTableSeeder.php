<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('permission_role')->truncate();

        // Get the necessary roles
        $admin_role = Role::where('name', Role::ADMIN)->first();
        $principal_role = Role::where('name', Role::PRINCIPAL)->first();
        $subscriber_role = Role::where('name', Role::SUBSCRIBER)->first();

        // Get the necessary permissions by their ids
        $all_permissions = Permission::pluck('id');
        $principal_permissions = Permission::where('name', 'like', '%schools')->pluck('id');
        $subscriber_permissions = Permission::where('name', 'view schools')->pluck('id');


        // Give the admin role all the permissions
        $admin_role->permissions()->sync($all_permissions);

        // Give the principal permissions related to his schools
        $principal_role->permissions()->sync($principal_permissions);

        // Give the subscriber some permissions,
        // e.g a subscriber can only view a list of schools
        $subscriber_role->permissions()->sync($subscriber_permissions);
        

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
