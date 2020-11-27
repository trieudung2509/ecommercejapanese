<?php

use App\Enum\RoleEnum;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            [
                'id'  => RoleEnum::ADMIN['id'],
                'name' => RoleEnum::ADMIN['name'],
                'created_at' => Carbon::now()
            ],
            [
                'id'   => RoleEnum::USER['id'],
                'name' => RoleEnum::USER['name'],
                'created_at' => Carbon::now()
            ],
            [
                'id' => RoleEnum::CUSTOMER['id'],
                'name' => RoleEnum::CUSTOMER['name'],
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
