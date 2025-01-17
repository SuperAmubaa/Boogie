<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role_id' => 1, // Pastikan 1 adalah ID role yang valid di tabel role
            'remember_token' => null, // Bisa diisi null jika tidak digunakan
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}