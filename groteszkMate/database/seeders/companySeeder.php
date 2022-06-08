<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use Faker\Factory as Faker;


class companySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //DB:SEED - COMPANY
        $faker = Faker::create();
        foreach (range(1, 10) as $value) {
            DB::table('company_database')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'logo' => $faker->url,
                'url' => $faker->url
            ]);
        }
    }
}
