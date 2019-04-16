<?php

namespace App;

class Permission extends \Spatie\Permission\Models\Permission
{

    public static function defaultPermissions()
    {
        return [
            ['view_users','Xem tài khoản'],
            ['add_users','Thêm tài khoản'],
            ['edit_users','Cập nhật tài khoản'],
            ['delete_users','Xóa tài khoản'],

            ['view_roles','Xem quyền'],
            ['add_roles','Thêm quyền'],
            ['edit_roles','Cập nhật quyền'],
            ['delete_roles','Xóa quyền'],

            ['view_buildings','Xem tòa nhà'],
            ['add_buildings','Thêm tòa nhà'],
            ['edit_buildings','Cập nhật tòa nhà'],
            ['delete_buildings','Xóa tòa nhà'],

            ['view_apartments','Xem căn hộ'],
            ['add_apartments','Thêm căn hộ'],
            ['edit_apartments','Cập nhật căn hộ'],
            ['delete_apartments','Xóa căn hộ'],

            ['view_owner_apartment','Xem chủ hộ'],
            ['add_owner_apartment','Thêm chủ hộ'],
            ['edit_owner_apartment','Cập nhật chủ hộ'],
            ['delete_owner_apartment','Xóa chủ hộ'],

            ['view_residents','Xem cư dân'],
            ['add_residents','Thêm cư dân'],
            ['edit_residents','Cập nhật cư dân'],
            ['delete_residents','Xóa cư dân'],

            ['view_employees','Xem nhân viên'],
            ['add_employees','Thêm nhân viên'],
            ['edit_employees','Cập nhật nhân viên'],
            ['delete_employees','Xóa nhân viên'],

            ['view_services','Xem dịch vụ'],
            ['add_services','Thêm dịch vụ'],
            ['edit_services','Cập nhật dịch vụ'],
            ['delete_services','Xóa dịch vụ'],

            ['view_devices','Xem thiết bị'],
            ['add_devices','Thêm thiết bị'],
            ['edit_devices','Cập nhật thiết bị '],
            ['delete_devices','Xóa thiết bị'],

            ['view_maintance','Xem thông tin sửa chữa, nâng cấp'],
            ['add_maintance','Thêm thông tin sửa chữa, nâng cấp'],
            ['edit_maintance','Cập nhật thông tin sửa chữa, nâng cấp'],
            ['delete_maintance','Xóa thông tin sửa chữa, nâng cấp'],

            ['view_report','Xem đánh giá'],
            ['add_report','Thêm đánh giá'],
            ['edit_report','Cập nhật đánh giá'],
            ['delete_report','Xóa đánh giá']
        ];
    }
}
