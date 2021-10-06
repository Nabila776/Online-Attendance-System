<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user=User::create([
            'username'=>'UserFaculty1',
            //'password'=>Hash::make('12'),
            'password'=>Hash::make('12'),
            'status'=>'A',
            'role_id'=>'1'
        ]);
        $user=User::create([
            'username'=>'userStudent1',
            'password'=>Hash::make('123'),
            'status'=>'A',
            'role_id'=>'2'
        ]);
        $user=User::create([
            'username'=>'userStudent2',
            'password'=>Hash::make('1234'),
            'status'=>'A',
            'role_id'=>'2'
        ]);
    }
}
