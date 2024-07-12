<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        DB::table('users')-> insert([

            //Admin
            [
                'fullName' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@email.com',
                'password' => Hash::make('admin'),
                'designation' => 'Lecturer',
                'role' => 'admin',
                'status' => 'active',


            ],

            //stuff
            [
                'fullName' => 'stuff',
                'username' => 'stuff',
                'email' => 'stuff@email.com',
                'password' => Hash::make('stuff'),
                'designation' => 'Stuff',
                'role' => 'stuff',
                'status' => 'active',


            ],

            //student
            [
                'fullName' => 'student',
                'username' => 'student',
                'email' => 'student@email.com',
                'password' => Hash::make('student'),
                'role' => 'student',
                'designation' => 'Student',
                'status' => 'active',


            ],
            //demo
            [
                'fullName' => 'Swapnil',
                'username' => 'swapnil16',
                'email' => 'swapnil@email.com',
                'password' => Hash::make('swapnil'),
                'designation' => 'Lecturer',
                'role' => 'admin',
                'status' => 'active',


            ]
        ]);

        // DB::table('notice')->insert([
        //     [
        //         notice
        //     ]
        // ])
    }
}
