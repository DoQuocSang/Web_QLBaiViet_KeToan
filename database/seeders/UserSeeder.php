<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_user')->insert([
            'user_name' => 'hTrang',
            'user_email' => 'trang@example.com',
            'user_password' => '1',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tbl_user')->insert([
            'user_name' => 'QHuy',
            'user_email' => 'huy@example.com',
            'user_password' => '1',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tbl_user')->insert([
            'user_name' => 'QSang',
            'user_email' => 'sang@example.com',
            'user_password' => '1',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
