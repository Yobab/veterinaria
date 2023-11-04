<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $permisos = [
            "view-patients",
            "create-patients",
            "edit-patients",
            "delete-patients",
            "view-dates",
            "create-dates",
            "edit-dates",
            "delete-dates",
            "view-treatments",
            "create-treatments",
            "edit-treatments",
            "delete-treatments",
            "view-diseases",
            "create-diseases",
            "edit-diseases",
            "delete-diseases",
            "view-allergies",
            "create-allergies",
            "edit-allergies",
            "delete-allergies",
            "view-roles",
            "create-roles",
            "edit-roles",
            "delete-roles",
            "view-users",
            "create-users",
            "edit-users",
            "delete-users"
        ];
        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        $clientRole = Role::create(['name' => 'client']);
        $clientRole->givePermissionTo('view-dates');

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt(12345678)
        ]);

        $user->assignRole('admin');
    }
}
