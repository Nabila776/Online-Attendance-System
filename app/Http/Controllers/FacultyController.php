<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Faculty;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FacultyController extends Controller
{
    public function index()
    {
        $users=Session::get('user_id');
        $faculty=Faculty::where('user_id',$users)->first();
        //dd($faculty->courses);
        //$users->faculty()->all();
        return view('facultyIndex',compact('faculty'));
        //
    }
    public function ShowStudentList(Course $course)
    {
        //dd($course);
        return view('studentList',compact('course'));
    }
    public function showStudentReport(Student $student)
    {
        //dd($course);
        return view('studentShowReport',compact('student'));
    }
}
