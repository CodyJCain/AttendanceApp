<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerifyPasscode extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = auth()->user();
        $studentID = $user->id;
        $passcode = $request->passcode;
        $milliseconds = round(microtime(true) * 1000);
        $courses = DB::table('courses_users')->where('user_id', '=', $user->id)->get();
        
        foreach($courses as $course)
        {
            $classPeriod = DB::table('classes')->where('timeStart', '<', $milliseconds)->where('timeEnd', '>', $milliseconds)->where('course_id', '=', $course->course_id)->get();
            if($classPeriod->count() != 0)
            {
                foreach($classPeriod as $class)
                {
                    $passcodes = DB::table('passcodes')->where('class_id', '=', $class->id)->get();
                }
                $currentCourse = $course;
            }
        }
        if($passcodes->count() == 0)
        {
            return view('failure');
        }
        foreach($passcodes as $classPasscode)
        {
            if($passcode = $classPasscode)
            {
                DB::table('attendance')-> updateOrInsert(['class_id' => $currentCourse->id, 'user_id' => $studentID, 'course_id' => $currentCourse->course_id], ['status' => 'Present']);
                return view('success');
            }
            else
            {
                return view('failure');
            }
        }

        //return view('failure');
    }
}
