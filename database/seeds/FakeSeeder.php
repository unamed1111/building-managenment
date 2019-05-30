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
        for($i = 1; $i< 3; $i++ )
        {
             DB::table('buildings')->insert([
                 'name' => 'Tòa A' . $i,
                 'description' => 'Tòa nhà A' . $i,
                 'phone' => $faker->phoneNumber
             ]);
        }
        for($building = 1; $building< 3; $building++ )
        {
            for($floor = 1 ; $floor< 11 ; $floor++)
            {
                for ($apartment_on_floor = 1; $apartment_on_floor < 11; $apartment_on_floor++) 
                { 
                     DB::table('apartments')->insert([
                         'name' => 'A'.$building.' '.$floor . ($apartment_on_floor < 10 ? '0'.$apartment_on_floor : $apartment_on_floor),
                         'floor' => $floor,
                         'status' => 1,
                         'building_id' => $building,
                         'owner_name' => $faker->name,
                         'phone' => $faker->phoneNumber,
                         'acreage' => rand(70,120),
                        ]);
                }
            }
        }

        for($apartments = 1; $apartments< 201; $apartments++ )
        {
	        for ($resident=	1; $resident < rand(2,4) ; $resident++) { 
	        	DB::table('residents')->insert([
					'name' => $faker->name,
					'dob' => $faker->date,
					'gender' => rand(0,1),
					'passport' => $faker->creditCardNumber,
					'email' => $faker->safeEmail,
					'phone' => $faker->phoneNumber,
					'apartment_id' => $apartments
				]);
	        }
	    }
        $diachi = ['Hà Nôi', 'Hai bà Trưng', 'Cầu giấy'];
   		for ($employee=	1; $employee < 10; $employee++) 
        {
   		      	DB::table('employees')->insert([
				'name' => $faker->name,
				'dob' => $faker->date,
				'gender' => rand(0,1),
				'position' => rand(0,5),
				'type' => rand(1,2),
				'email' => $faker->safeEmail,
				'phone' => $faker->phoneNumber,
				'building_id' => 1,
                'address' => 'Cầu giấy',
            ]);
        }
        $dichvus = ['Gửi xe máy', 'Gửi xe Ô tô', 'Quản lý tòa nhà', 'vệ sinh', 'An ninh tòa nhà', 'Quản lý thiết bị chung'];
        $cost_dichvu = [200000,500000,150000,50000,80000,40000];
        foreach ($dichvus as $key => $service) 
	   	{ 
	   		DB::table('services')->insert([
	   		'name' => 'Dịch vụ '. $service ,
	   		'cost' => $cost_dichvu[$key],
	   		'unit' => 0,
	   		'description' => $faker->paragraph,
	   		]);
	   	}
	    for($apartments = 1; $apartments< 201; $apartments++ )
	    {
	    	for ($service = 1; $service < rand(2,6) ; $service++)
	    	{
	    		DB::table('apartment_services')->insert([
			   		'apartment_id' => $apartments ,
			   		'service_id' => $service,
			   		'registration_time' => '2019-0'.rand(1,5).'-20',
			   		'comment' => 'Đăng kí dịch vụ sử dụng thường xuyên (mô tả đăng kí)',
			   		'qty' => ($service == 1 || $service == 2) ? rand(1,2) : 1,
			   		]);
	    	}
	    }
        //seed thiet bị
        $thietbis = ['Đèn hành lang', 'Máy tính lễ tân', 'Điều hòa hành lang', 'Máy thông gió', 'Bộ chữa cháy', 'Thang máy', 'Chuông báo cháy hành lang', 'Vòi xịt nước khi cháy', 'điện thoại công cộng', 'Mạng nội bộ'];
        $nhacungcap = ['Công ty bóng đèn', 'Công ty máy tính Phát Hải', 'Điện lạnh Pico', 'HC','Công ty thang máy', 'Công ty thiết bị cháy nổ', 'Công ty thiết bị cháy nổ', 'Công ty thiết bị cháy nổ', 'viettel', 'VNPT'];
        foreach ($thietbis as $key => $thietbi)
        {
             DB::table('devices')->insert([
                 'name' => $thietbi,
                 'supplier' => $nhacungcap[$key],
                 'purchase_date' => '2019-04-24',
                 'floor' => 1,
                 'status' => 0,
                 'building_id' => rand(1,2)
             ]);
        }  
    }
}
