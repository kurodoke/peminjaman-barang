<?php

namespace Database\Seeders;

use App\Models\Administrator;
use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Administrator::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$IdkFxjr8Tf1P.AIEqpS7AeRlziPandU0u5zfv/HMmzn32r5uNGkn6', // hadeh123
            'phone_number' => fake()->phoneNumber(),
        ]);
    }
}
