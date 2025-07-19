<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::firstOrCreate(['email' => 'admin@admin.com'], [
            'name' => 'admin',
            'password' => \Illuminate\Support\Facades\Hash::make('12341234')
        ]);
        $role = \App\Models\Role::firstOrCreate(['name' => 'admin']);
        $user->roles()->sync($role->id);
    }
}
