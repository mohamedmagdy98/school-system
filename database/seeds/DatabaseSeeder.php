<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(BloodSeeder::class);
        $this->call(NationalitySeeder::class);
        $this->call(SpecialitySeeder::class);
        $this->call(JobSeeder::class);
        $this->call(MaritalstatusSeeder::class);
}
}
