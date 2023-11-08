<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrowing>
 */
class BorrowingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $timeEnd = fake()->randomElement([now()->createFromTime(mt_rand(1, 24), mt_rand(1, 59), mt_rand(1, 59)), null]);
        $validatedOrNo = mt_rand(0,1);

        return [
            'item_id' => Item::inRandomOrder()->first()->id,
            'student_id' => Student::inRandomOrder()->first()->id,
            'subject_id' => Subject::inRandomOrder()->first()->id,
            'validated' => ($timeEnd !== null ? (($validatedOrNo === 1) ? 1 : null) :  null),
            'date' => now()->createFromDate(mt_rand(2010, now()->year), mt_rand(1, 12), mt_rand(1, 31)),
            'time_start' => now()->createFromTime(mt_rand(1, 24), mt_rand(1, 59), mt_rand(1, 59)),
            'time_end' => $timeEnd,
            'note' => fake()->randomElement([fake()->text, null]),
        ];
    }
}
