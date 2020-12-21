<?php

use App\Enum\RoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
            'status' => '1',
            'description' => 'this is super user',
            'role_id' => RoleEnum::ADMIN['id']
        ];        
        User::create($user);
    }
}
