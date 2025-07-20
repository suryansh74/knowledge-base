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
        $memberRole = \App\Models\Role::firstOrCreate(['name' => 'member']);
        $problemPermissions = \App\Models\Permission::whereIn('name', [
            'problem_access', 'problem_create', 'problem_show', 'problem_update', 'problem_delete'
        ])->pluck('id');
        $tagPermissions = \App\Models\Permission::whereIn('name', [
            'tag_access', 'tag_create', 'tag_show', 'tag_update', 'tag_delete'
        ])->pluck('id');
        $commentPermissions = \App\Models\Permission::whereIn('name', [
            'comment_access', 'comment_create', 'comment_show', 'comment_update', 'comment_delete'
        ])->pluck('id');
        
        $memberRole->permissions()->sync(
            $problemPermissions->merge($tagPermissions)->merge($commentPermissions)
        );

    }
}
