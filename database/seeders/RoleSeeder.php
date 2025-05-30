<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'admin', 'description' => 'System Administrator'],
            ['name' => 'administrasi', 'description' => 'Petugas Perpustakaan'],
            ['name' => 'user', 'description' => 'Anggota Perpustakaan'],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role['name']], $role);
        }
        $this->command->info('Roles have been created successfully');
    }
}
