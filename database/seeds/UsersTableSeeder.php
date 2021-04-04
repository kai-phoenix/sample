<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                'id' => 1,
                'name' => 'admin',
                'password' => 'admin',
                'admin' => 1,
            ],
            [
                'id' => 2,
                'name' => 'testuser1',
                'password' => 'password',
                'admin' => 0,
            ],
            [
                'id' => 3,
                'name' => 'testuser2',
                'password' => 'password',
                'admin' => 0,
            ],
        ];
        
        foreach($users as $user){
            DB::table('users')->insert($user);
        }
        
    }
}
