<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use Faker\Factory as Faker;

class employeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB:SEED - EMPLOYEE
        $faker = Faker::create();
        foreach (range(1, 10) as $value) {
            DB::table('employee_database')->insert([
                'firstname' => $faker->firstname,
                'lastname' => $faker->lastname,
                'company' => $faker->company,
                'email' => $faker->email,
                'phone' => $faker->numerify('#########')
            ]);
        }
    }
}
