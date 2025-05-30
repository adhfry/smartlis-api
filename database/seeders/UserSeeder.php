<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate([
            'email' => 'a@a',
        ], [
            'name' => 'Ahda Firly Barori',
            'no_hp' => '081233107475',
            'alamat' => 'Jl. Diponegoro 109 B',
            'tempat_lahir' => 'Sumenep',
            'tanggal_lahir' => '2005-01-12',
            'jenis_kelamin' => 'L',
            'password' => Hash::make('20050121'), // Ganti nanti jika perlu
        ]);

        $adminRole = Role::where('name', 'admin')->first();
        if ($adminRole && !$user->roles->contains($adminRole->id)) {
            $user->roles()->attach($adminRole->id);
        }
        $this->command->info('Users have been created successfully');
    }
}
