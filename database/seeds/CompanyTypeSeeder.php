<?php

use Illuminate\Database\Seeder;
use App\CompanyType;

class CompanyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyType::create([
        	'name' => 'Developer'
        ]);

        CompanyType::create([
        	'name' => 'Venue'
        ]);
    }
}
