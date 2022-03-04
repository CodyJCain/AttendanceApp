<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceTotalStudent extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = auth()->user();
        
        $courses = DB::table('courses_users')->where('user_id', '=', $user->id)->get();

        $data = "<table><tr><th>Class</th><th>Abcenses</th></tr>";

        foreach($courses as $course)
        {
            $milliseconds = round(microtime(true) * 1000);
            $classCount = DB::table('classes')->where('timeStart', '<', $milliseconds)->where('course_id', '=', $course->course_id)->count();
            $presentCount = DB::table('attendance')->where('user_id', '=', $user->id)->where('course_id', '=', $course->course_id)->where('status', '=', 'Present')->orWhere('status', '=', 'Tardy')->where('user_id', '=', $user->id)->where('course_id', '=', $course->course_id)->count();
            $tardyCount = DB::table('attendance')->where('user_id', '=', $user->id)->where('course_id', '=', $course->course_id)->where('status', '=', 'Tardy')->count();
            $courseData = DB::table('courses')->where('code', '=', $course->course_id)->get();
            $count = $presentCount - ($tardyCount / 3);
            $count = $classCount - $count;
            settype($count, "integer");
            foreach($courseData as $classData)
            {
                $form = 
                "<form action=\"/AttendanceClassStudent\" method=\"post\">
                <input type=hidden name='code' value='123'>
                <input type=\"submit\" value=\"$classData->name\">
                </form>";

                //$data .= "<tr><td>$classData->name</td><td>$count</td></tr>";

                $link = "<a href=\"" . route('AttendanceClassStudentIn')   .     "?code=$course->course_id\">$classData->name</a>";
            }
            $data .= "<tr><td>$link</td><td>$count</td></tr>";
        }
        $data .= "</table>";

        return view('attendance', ['data'=>$data, 'courseData'=>$courseData]);
    }

}
