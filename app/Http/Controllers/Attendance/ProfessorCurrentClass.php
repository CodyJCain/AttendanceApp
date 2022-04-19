<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfessorCurrentClass extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $header = "Attendance";
        $user = auth()->user();
        $milliseconds = round(microtime(true) * 1000);
        $currentCourses = DB::table('classes')->where('timeStart', '<', $milliseconds)->where('timeEnd', '>', $milliseconds)->where('instructor_id', '=', $user->id)->get();
        if($currentCourses->count() != 0)
        {
            $data = $currentCourses->count();
            //return view('attendance', ['data'=>$data]);
        }
        else
        {
            //return view('success');
        }
        foreach($currentCourses as $currentCourse)
        {
            
            $data = "<table><tr><th>Name</th><th>Status</th><th>Click To Edit</th></tr>";
            $students = DB::table('courses_users')->where('course_id', '=', $currentCourse->course_id)->get();
            foreach($students as $student)
            {
                //$data = $student->user_id;
                //return view('attendance', ['data'=>$data]);
                
                $attendance = DB::table('attendance')->where('user_id', '=', $student->user_id)->where('class_id', '=', $currentCourse->id)->get();
                if($attendance->count() != 0)
                {
                    foreach($attendance as $record)
                    {
                        $status = $record->status;
                    }
                }
                else
                {
                    $status = 'Absent';
                }
                $names = DB::table('users')->where('id', '=', $student->user_id)->get();    
                foreach($names as $name)
                {
                    $data .= "<tr><td>$name->name</td><td>$status</td><td><a href=\"/Edit?name=$name->name&classID=$currentCourse->id&studentID=$name->id\" class=\"btn btn-primary btn-sm\">Edit</a></td></tr>";
                }
            }
        }
        //$data .= "<tr><td>Test</td><td>Entry</td></tr>";
        return view('attendance', ['data'=>$data, 'header'=>$header]);

    }
}
