<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserInfo;
use DB;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        
        DB::table('users')->insert([
            'username'        => "root",
            'first_name'        => "root",
            'last_name'         => "root",
            'middle_name'        => "root",
            'contact_number'         => "root",
            'user_role_id'         => "0",
            'avatar'         => "",
            'email'             => 'demo@demo.com',
            'password'          => Hash::make('password'),
        ]);
     
    }
}
