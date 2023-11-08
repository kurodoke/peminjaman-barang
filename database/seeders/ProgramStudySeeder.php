<?php

namespace Database\Seeders;

use App\Models\ProgramStudy;
use Illuminate\Database\Seeder;

class ProgramStudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programStudies = [
            'Teknik Informatika', 'Teknik Sipil',
            'Teknik Elektro', 'PGSD',
        ];

        foreach ($programStudies as $programStudy) {
            ProgramStudy::create([
                'name' => $programStudy,
            ]);
        }
    }
}
