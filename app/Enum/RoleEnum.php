<?php 
namespace App\Enum;
abstract class RoleEnum {
    const ADMIN = [
        'id' => 1,
        'name' => 'Admin'
    ];
    const USER = [
        'id' => 2,
        'name'=>'User'
    ];
    const CUSTOMER = [
        'id' => 3,
        'name' => 'Customer'
    ];
}