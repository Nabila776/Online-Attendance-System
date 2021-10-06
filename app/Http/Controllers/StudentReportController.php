<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentReportController extends Controller
{
    //
    public function index()
    {
        $users=Session::get('user_id');
        $student=Student::where('user_id',$users)->first();
        return view('studentReport',compact('student'));
    }
    public function ShowAttendanceInfo(Course $course)
    {
        //dd($course);
        $users=Session::get('user_id');
        $student=Student::where('user_id',$users)->first();
       // $cour=$course->id;
       // dd($cour);
       // $student=where();
      // dd($student);
       //dd($std);
       // $attendance=Attendance::where('course_id',$course)->andWhere('student_id',$student);
       /// dd($attendance);
        return view('StudentAttendanceInfo',compact('course'));
    }
}
