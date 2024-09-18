<?php

use Database\Seeders\MovementSeeder;
use Database\Seeders\PersonalRecordSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(MovementSeeder::class);
        $this->call(PersonalRecordSeeder::class);
    }
}
