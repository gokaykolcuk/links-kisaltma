<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => Str::uuid()->toString(),
            'name' => 'Gökay',
            'lastname' => 'Kolcuk',
            'email'=>'gokay@gmail.com',
            'username' => 'gokay',
            'role'=>'admin',
            'status'=>'active',
            'password' => bcrypt(12345678),
        ]);
    }
}
