<?php

define('GENDER',['0' => 'Nam', '1' => 'Nữ']);
define('DATETIME_FORMAT', 'd-m-Y H:i:s');

define('APARTMENT_STATUS',[0 => "Chưa được sử dụng" , 1 => "Đang được sử dụng"]);
define('POSITION',[
	0 => 'Nhân viên lễ tân',
	1 => 'Nhân viên thu ngân',
	2 => 'Nhân viên kĩ thuật',
	3 => 'Trưởng phòng nhân sự',
	4 => 'Bản quản lý',
	5 => 'Bảo vệ'
]);

define('SERVICE_UNIT',[
	'0' => 'Tháng',
	'1' => 'Năm'
]);

define('ACCOUNT_TYPE',[
	0 => 'Amin',
	1 => 'Ban quản lý',
	2 => 'Nhân viên',
	3 => 'Cư dân'
]);

define('REPORT_STATUS',[
	0 => 'Chưa đọc',
	1 => 'Đã đọc',
	2 => 'Đã xử lý',
]);

define('ROLE_ADMIN',1);
define('ROLE_MANAGER',2);
define('ROLE_EMPLOYEE',3);
define('ROLE_RESIDENNT',4);

define('ROlE',[
	ROLE_ADMIN => 'Amin',
	ROLE_MANAGER => 'Ban quản lý',
	ROLE_EMPLOYEE => 'Nhân viên',
	ROLE_RESIDENNT => 'Cư dân'
]);