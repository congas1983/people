<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'username' => 'username1',  
                'name' => 'People 1',
                'last_name'=>' last people ',             
                'password' => bcrypt('password1'),
                'role_id' => 1,
                'city_id' => 1,
                'email' => 'people1@peoplemarketing.com',                
                'created_at' => now(),
            ],
            [
                'username' => 'username2',
                'last_name'=>' last people 2',     
                'password' => bcrypt('password2'),
                'role_id' =>2,
                'city_id' => 1,
                'email' => 'people2@peoplemarketing.com',
                'name' => 'People 2',
                'created_at' => now(),
            ],
            [
                'username' => 'username3',
                'last_name'=>' last people 3',     
                'password' => bcrypt('password3'),
                'role_id' => 3,
                'city_id' => 1,
                'email' => 'people3@peoplemarketing.com',
                'name' => 'People 3',
                'created_at' => now(),
            ],          
                   
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
