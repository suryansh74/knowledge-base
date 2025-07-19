<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = \App\Models\Role::findOrFail(1);
        $permissions = \App\Models\Permission::all();
        $role->permissions()->sync($permissions->pluck('id'));
    }
}
