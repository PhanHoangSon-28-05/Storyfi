<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeederSuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_superAdmins = [
            ['fullname' => 'Phan Hoàng Sơn', 'email' => 'hoangson28052002@gmail.com', 'password' => Hash::make('123456789'), 'birthday' => '2002-05-28', 'gender' => 'Male', 'phone' => '0764765720', 'point' => '0']
        ];

        foreach ($user_superAdmins as $value) {
            User::updateOrCreate($value);
        }
    }
}
