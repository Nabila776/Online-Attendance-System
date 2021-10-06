<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $student=Student::create([
            'first_name'=>'Nabila',
            'last_name'=>'Islam',
            'email'=>'nabila@gmail.com',
           'user_id'=>'2'
        ]);
        $student=Student::create([
            'first_name'=>'Tahmid',
            'last_name'=>'Taz',
            'email'=>'tahmid@gmail.com',
            'user_id'=>'3'
        ]);
    }
}
