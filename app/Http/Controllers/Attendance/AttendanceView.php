<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceView extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $header = "Attendance";
        $classID = $request->classID;
        $data = "<table><tr><th>Name</th><th>Status</th></tr>";
        $classes = DB::table('classes')->where('id', '=', $classID)->get();

        foreach($classes as $class)
        {
            $students = DB::table('courses_users')->where('course_id', '=', $class->course_id)->get();
            foreach($students as $student)
            {
                $users = DB::table('users')->where('id', '=', $student->user_id)->get();
                foreach($users as $user)
                {
                    $attendance = DB::table('attendance')->where('class_id', '=', $classID)->where('user_id', '=', $user->id)->get();
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

                    $data .= "<tr><td>$user->name</td><td>$status</td><td><a href=\"/Edit?name=$user->name&classID=$classID&studentID=$user->id\" class=\"btn btn-primary btn-sm\">Edit</a></td></tr>";
                }
            }
        }
        return view('attendance', ['data'=>$data, 'header'=>$header]);
    }
}
