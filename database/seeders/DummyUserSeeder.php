<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $superadmin = User::create([
                'name' => 'super admin',
                'email' => 'superadmin@example.com',
                'password' => Hash::make('superadmin123'),
                'role_id' => 1, // Pastikan 1 adalah ID role yang valid di tabel role
                'remember_token' => null, // Bisa diisi null jika tidak digunakan
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    
            $admin = User::create([
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin123'),
                'role_id' => 2, // Pastikan 1 adalah ID role yang valid di tabel role
                'remember_token' => null, // Bisa diisi null jika tidak digunakan
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    
            $petugas = User::create([
                'name' => 'petugas',
                'email' => 'petugas@example.com',
                'password' => Hash::make('petugas123'),
                'role_id' => 3, // Pastikan 1 adalah ID role yang valid di tabel role
                'remember_token' => null, // Bisa diisi null jika tidak digunakan
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    
            // Assign role ke user
            $superadmin->role()->attach(Role::where('name', 'superadmin')->first());
            $admin->role()->attach(Role::where('name', 'admin')->first());
            $petugas->role()->attach(Role::where('name', 'petugas')->first());
        }
    }
}
