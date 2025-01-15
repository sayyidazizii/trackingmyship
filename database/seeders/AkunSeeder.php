<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AkunSeeder extends Seeder
{
    public function run(): void
    {
        DB::table("users")->insert([
            [
                'fullname' => 'Admin',
                'username'=> 'admin',
                'email'=> 'admin@gmail.com',
                'password'=> bcrypt('12345678'),
                'level'=> 'admin',
                'alamat' => 'Indonesia',
                'dompet_id' => '1',
            ],
            [
                'fullname' => 'User',
                'username'=> 'user',
                'email'=> 'user@gmail.com',
                'password'=> bcrypt('12345678'),
                'level'=> 'user',
                'alamat' => 'Indonesia',
                'dompet_id' => '2',
            ],
        ]);
    }
}
