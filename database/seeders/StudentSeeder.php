<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'program_study_id' => 1,
            'identification_number' => 'G1A021099',
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@gmail.com',
            'password' => '$2y$10$IdkFxjr8Tf1P.AIEqpS7AeRlziPandU0u5zfv/HMmzn32r5uNGkn6', // hadeh123,
            'phone_number' => '+628123456789',
        ]);

        $students = Student::factory(150)->make()->toArray();

        $recordsToInsert = [];
        foreach ($students as $student) {
            $createdAt = now();
            $student['created_at'] = $createdAt;
            $student['updated_at'] = $createdAt;
            $recordsToInsert[] = $student;
        }

        foreach (array_chunk($recordsToInsert, count($recordsToInsert) / 2) as $chunk) {
            Student::insert($chunk);
        }
    }
}
