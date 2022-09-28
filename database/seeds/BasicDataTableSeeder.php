<?php

use Illuminate\Database\Seeder;

class BasicDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\BasicData::class, 1)->create();
    }
}
