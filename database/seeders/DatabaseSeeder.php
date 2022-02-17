<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\WordSeeder;

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
			WordSeeder::class,
		]);
	}
		
}
