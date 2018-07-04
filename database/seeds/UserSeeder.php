<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
        	'name' => 'Admin',
        	'email' => 'admin@gmail.com',
        	'tel' => '8787878787',
        	'password' => bcrypt('password')
        ]);
        $admin->assignRole('Admin');
    }
}
