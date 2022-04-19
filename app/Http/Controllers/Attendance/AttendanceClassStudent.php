<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceClassStudent extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $header = "Attendance";
        $classCode = $request->code;
        $user = auth()->user();
        $milliseconds = round(microtime(true) * 1000);
        $classes = DB::table('classes')->where('course_id', '=', $classCode)->where('timeEnd', '<', $milliseconds)->get();
        $courses = DB::table('courses')->where('code', '=', $classCode)->get();
        $data = "<table><tr><th>Class</th><th>Status</th></tr>";
        foreach($classes as $class)
        {
            $attendance = null;
            $attendance = DB::table('attendance')->where('class_id', '=', $class->id)->get();
            $status = 'Unchanged';
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

            foreach($courses as $course)
            {
                $data .= "<tr><td>$class->class_date</td><td>$status</td></tr>";
            }
        }
        return view('attendance', ['data'=>$data, 'header'=>$header]);
    }
}
