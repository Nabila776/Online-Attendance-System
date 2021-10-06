<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index()
    {
       // $users =User::find($request->session()->get('user_id'));
        $users=Session::get('user_id');
         $student=Student::where('user_id',$users)->first();
        //dd($student->first_name);
        //$users->student()->all();
        return view('studentIndex',compact('student'));
        //
    }
    public function gotoAttendancePage(Course $course)
    {
        //dd($course);
        return view('attendancePage',compact('course'));
    }
    public function AttendanceCreate(Request $request,Course $course)
    {
        $users=Session::get('user_id');
        $student=Student::where('user_id',$users)->first();
        $Datetime=now();
        $date=$Datetime->format('Y-m-d');
        $time=$Datetime->format('h:i:s');
        $request->validate([
            'attendance_date'=>'required'
        ]);
       // dd($time->format('Y-m-d'));
       // dd($ttt);
       // dd($time->format('y-m-d'));
       // dd($course->time_start);
       // dd($course->time_end);
       // dd($student->id);
       // dd($request->attendance_date);
        if($date==$request->attendance_date)
        {
            if ($time>=$course->time_start && $time<=$course->time_end)
            {
                $attendance=Attendance::create([
                    'attendance_date' => $request->attendance_date,
                    'student_id' => $student->id,
                    'course_id' => $course->id,
                ]);
                return view('attendancePage',compact('course'))->with("Attendance Successfully");
            }
            else{
                echo ("Attendance timeout");
               // return redirect()->back();
               // return redirect()->back()->with(message,"Attendance timeout");
            }

        }
        else{

            echo ("Enter correct date");
             //return redirect()->back();
          // return redirect()->back()->with("Enter correct date");
        }

    }

}
