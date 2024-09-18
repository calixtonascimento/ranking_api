<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Seed the users table.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            ['name' => 'Joao'],
            ['name' => 'Jose'],
            ['name' => 'Paulo'],
        ]);
    }
}
