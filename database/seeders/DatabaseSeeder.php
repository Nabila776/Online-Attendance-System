<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
       /* $role=Role::create([
            'name'=>'faculty',
            'status'=>'A'
        ]);
        $role=Role::create([
            'name'=>'student',
            'status'=>'A'
        ]);
        $user=User::create([
            'username'=>'N',
            'password'=>Hash::make('12'),
            'status'=>'A',
            'role_id'=>'1'
        ]);
        $role->Users()->create([
            'username'=>'A',
            'password'=>Hash::make('123'),
            'status'=>'A',
            'role_id'=>'2'
        ]);
        $role->Users()->create([
            'username'=>'S',
            'password'=>Hash::make('1234'),
            'status'=>'A',
            'role_id'=>'2'
        ]);*/
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
           // StudentSeeder::class,
           // FacultySeeder::class,

        ]);
        $faculty=Faculty::create([
            'first_name'=>'Mahbub',
            'last_name'=>'Hasan',
            'email'=>'mahbub.hasan@gmail.com',
            'user_id'=>'1'
        ]);
        $student=Student::create([
            'first_name'=>'Nabila',
            'last_name'=>'Islam',
            'email'=>'nabila@gmail.com',
            'user_id'=>'2'
        ]);
       $course=Course::create([
           'courseCode'=>'CSE4033',
           'courseTitle'=>'Web and Internet Programming',
           'CourseSection'=>'3',
           'time_start'=>'06:00',
           'time_end'=>'18:00'
       ]);
       $student->courses()->attach([$course->id]);
       $faculty->courses()->attach([$course->id]);
        $course=Course::create([
            'courseCode'=>'CSE4034',
            'courseTitle'=>'Web and Internet Programming Lab',
            'CourseSection'=>'2',
            'time_start'=>'06:00',
            'time_end'=>'16:00'
        ]);
        $student->courses()->attach([$course->id]);
        $faculty->courses()->attach([$course->id]);
        $student=Student::create([
            'first_name'=>'Tahmid',
            'last_name'=>'Taz',
            'email'=>'tahmid@gmail.com',
            'user_id'=>'3'
        ]);
        $student->courses()->attach([$course->id]);




    }
}
