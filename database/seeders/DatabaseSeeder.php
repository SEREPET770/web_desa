<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $accounts = [
            ['name' => 'Kepala Desa', 'username' => 'kepala_desa', 'role' => 'kepala_desa', 'email' => 'kepala.desa@desajegreg.id', 'password' => 'kepala123'],
            ['name' => 'Super Admin', 'username' => 'super_admin', 'role' => 'super_admin', 'email' => 'super.admin@desajegreg.id', 'password' => 'super123'],
            ['name' => 'Admin Desa', 'username' => 'admin', 'role' => 'admin', 'email' => 'admin@desajegreg.id', 'password' => 'admin123'],
        ];

        foreach ($accounts as $account) {
            User::updateOrCreate(
                ['username' => $account['username']],
                [...$account, 'password' => Hash::make($account['password'])],
            );
        }
    }
}
