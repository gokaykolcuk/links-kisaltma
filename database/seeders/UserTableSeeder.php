<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 20; $i++) {  // 20 kullanıcı oluşturmak için döngü
            DB::table('users')->insert([
                'id' => Str::uuid()->toString(),
                'name' => $faker->name(),
                'lastname' => $faker->lastName(),
                'email' => $faker->unique()->email(),  // Benzersiz e-posta adresi sağlar
                'username' => $faker->unique()->userName(),  // Benzersiz kullanıcı adı sağlar
                'role' => 'user',
                'status' => 'active',
                'password' => Hash::make('12345678'),  // Hash ile şifreleme
            ]);
    }
} 
} 
