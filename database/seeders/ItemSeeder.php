<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 14; $i++) {
            Item::create([
                'name' => 'Infokus '.$i,
            ]);
        }

        for ($i = 1; $i <= 12; $i++) {
            Item::create([
                'name' => 'Meja '.$i,
            ]);
        }

        for ($i = 1; $i <= 20; $i++) {
            Item::create([
                'name' => 'Sapu '.$i,
            ]);
        }

        for ($i = 1; $i <= 10; $i++) {
            Item::create([
                'name' => 'Kipas '.$i,
            ]);
        }
    }
}
