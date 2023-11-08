<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::create([
            'code' => 'TIF-999',
            'name' => 'Pemrograman Berbasis Kerangka Kerja',
        ]);
        Subject::create([
            'code' => 'TIF-111',
            'name' => 'Riset Operasi',
        ]);
    }
}
