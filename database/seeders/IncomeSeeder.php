<?php

namespace Database\Seeders;

use App\Models\Income;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 100; $i++) {
            Income::create([
                'notes' => $faker->sentence,
                'category_id' => $faker->numberBetween(1, 20),
                'amount' => $faker->numberBetween(100, 100000),
                'date' => $faker->date(),
            ]);
        }

    }
}
