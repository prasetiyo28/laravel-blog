<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view posts']);
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'delete posts']);
        Permission::create(['name' => 'publish posts']);
        Permission::create(['name' => 'unpublish posts']);
        Permission::create(['name' => 'create comments']);

        //create roles and assign existing permissions
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo('view posts');
        $userRole->givePermissionTo('create comments');
        
        
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo('view posts');
        $adminRole->givePermissionTo('create posts');
        $adminRole->givePermissionTo('edit posts');
        $adminRole->givePermissionTo('delete posts');
        $adminRole->givePermissionTo('publish posts');
        $adminRole->givePermissionTo('unpublish posts');

        // $superadminRole = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule

        // create demo users
        $user = User::factory()->create([
            'name' => 'User Posts',
            'email' => 'user@asfar.ae',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($userRole);

        $user = User::factory()->create([
            'name' => 'Admin Asfar',
            'email' => 'admin@asfar.ae',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($adminRole);

        // $user = User::factory()->create([
        //     'name' => 'Example superadmin user',
        //     'email' => 'admin@asfar.ae',
        //     'password' => bcrypt('12345678')
        // ]);
        // $user->assignRole($superadminRole);
    }
}
