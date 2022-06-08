<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;


use Database\Seeders\userSeeder;
use Database\Seeders\companySeeder;
use Database\Seeders\employeeSeeder;
use Faker\Factory as Faker;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            userSeeder::class,
        ]);
        $this->call([
            companySeeder::class,
        ]);

        $this->call([
            employeeSeeder::class,
        ]);
    }
}
