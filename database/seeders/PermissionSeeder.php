<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'permission' => [
                'access' => true,
                'create' => true,
                'show' => true,
                'update' => true,
                'delete' => true,
            ],
            'role' => [
                'access' => true,
                'create' => true,
                'show' => true,
                'update' => true,
                'delete' => true,
            ],
            'user' => [
                'access' => true,
                'create' => true,
                'show' => true,
                'update' => true,
                'delete' => true,
            ],
            'tag' => [
                'access' => true,
                'create' => true,
                'show' => true,
                'update' => true,
                'delete' => true,
            ],
            'problem' => [
                'access' => true,
                'create' => true,
                'show' => true,
                'update' => true,
                'delete' => true,
            ],
            'comment' => [
                'access' => true,
                'create' => true,
                'show' => true,
                'update' => true,
                'delete' => true,
            ],
        ];

        foreach ($permissions as $name => $actions) {
            foreach ($actions as $action => $value) {
                \App\Models\Permission::firstOrCreate([
                    'name' => $name . '_' . $action,
                ]);
            }
        }
    }
}
