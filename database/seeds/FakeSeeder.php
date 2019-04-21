<?php

use Illuminate\Database\Seeder;

class FakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = \Faker\Factory::create();
        // for($i = 1; $i< 5; $i++ )
        // {
        // 	DB::table('buildings')->insert([
        // 		'name' => 'Tòa A' . $i,
        // 		'description' => 'Tòa nhà A' . $i,
        // 		'phone' => $faker->phoneNumber
        // 	]);
        // }
     //    for($building = 1; $building< 5; $building++ )
     //    {
     //    	for($floor = 1 ; $floor< 11 ; $floor++){
     //    		for ($apartment_on_floor=0; $apartment_on_floor < 15; $apartment_on_floor++) { 
     //    			DB::table('apartments')->insert([
					// 	'name' => 'A'.$building.' '.$floor . ($apartment_on_floor < 10 ? '0'.$apartment_on_floor : $apartment_on_floor),
					// 	'floor' => $floor,
					// 	'status' => 1,
					// 	'building_id' => $building,
					// 	'owner_name' => $faker->name,
					// 	'phone' => $faker->phoneNumber,
					// 	'acreage' => rand(50,120),
					// ]);
     //    		}
     //    	}
     //    }
    //     for($apartments = 1; $apartments< 604; $apartments++ )
    //     {
	   //      for ($resident=	1; $resident < rand(1,4) ; $resident++) { 
	   //      	DB::table('residents')->insert([
				// 	'name' => $faker->name,
				// 	'dob' => $faker->date,
				// 	'gender' => rand(0,1),
				// 	'passport' => $faker->creditCardNumber,
				// 	'email' => $faker->safeEmail,
				// 	'phone' => $faker->phoneNumber,
				// 	'apartment_id' => $apartments
				// ]);
	   //      }
	   //  }
	   // 		for ($resident=	1; $resident < 10; $resident++) {
	   // 		      	DB::table('employees')->insert([
				// 	'name' => $faker->name,
				// 	'dob' => $faker->date,
				// 	'gender' => rand(0,1),
				// 	'position' => rand(0,5),
				// 	'type' => rand(1,2),
				// 	'email' => $faker->safeEmail,
				// 	'phone' => $faker->phoneNumber,
				// 	'building_id' => 1
				// 
	   //      }
	   // for ($service= 1; $service < 21 ; $service++) 
	   // 	{ 
	   // 		DB::table('services')->insert([
	   // 		'name' => 'Dịch vụ '. $service ,
	   // 		'cost' => $faker->randomElement([200000,100000,150000,50000,70000,120000]),
	   // 		'unit' => 0,
	   // 		'description' => $faker->paragraph
	   // 		]);
	   // 	}
	    // for($apartments = 1; $apartments< 604; $apartments++ )
	    // {
	    // 	for ($service= 1; $service < rand(5,6) ; $service++)
	    // 	{
	    // 		DB::table('apartment_services')->insert([
			  //  		'apartment_id' => $apartments ,
			  //  		'service_id' => rand(1,20),
			  //  		'registration_time' => '2019-0'.rand(1,9).'-20',
			  //  		'comment' => 'Et culpa ea asperiores aliquid rerum. Consequuntur iusto aliquam veniam. Eum mole',
			  //  		'qty' => rand(1,2)
			  //  		]);
	    // 	}
	    // }
    }
}
