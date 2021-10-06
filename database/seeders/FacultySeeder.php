<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faculty=Faculty::create([
            'first_name'=>'Mahbub',
            'last_name'=>'Hasan',
            'email'=>'mahbub.hasan@gmail.com',
            'user_id'=>'1'
        ]);
    }
}
