<?php

use Illuminate\Database\Seeder;
use factories\UserFacetory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserFacetory::class);
         DB::table('users')->insert([
         	'email' => 'admin@admin.com',
	        'password' => Hash::make('123456'), // secret
	        'software_user_id' => 0 ,
	        'role' => 1 ,
	        'type' => 0 
         ]);
    }
}
