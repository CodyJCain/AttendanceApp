<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceTotalProfessor extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $header = "Attendance";
        $users = DB::table('courses_users')->where('course_id', '=', $request->code)->get();
        
        $courses = DB::table('courses')->where('code', '=', $request->code)->get();

        $data = "<table><tr><th>Name</th><th>Abcenses</th></tr>";
        //$data .= "<tr><td>test0</td><td>$request->code</td></tr>";
        foreach($courses as $course){
        foreach($users as $user){
            $names = DB::table('users')->where('id', '=', $user->user_id)->get();
            //$data .= "<tr><td>test1</td><td>CountTest</td></tr>";
            foreach($names as $name)
            {
                //$data .= "<tr><td>test2</td><td>CountTest</td></tr>";
                foreach($courses as $course)
                {
                    $milliseconds = round(microtime(true) * 1000);
                    $classCount = DB::table('classes')->where('timeStart', '<', $milliseconds)->where('course_id', '=', $request->code)->count();
                    $presentCount = DB::table('attendance')->where('user_id', '=', $user->user_id)->where('course_id', '=', $request->code)->where('status', '=', 'Present')->orWhere('status', '=', 'Tardy')->where('user_id', '=', $user->id)->where('course_id', '=', $request->code)->count();
                    $tardyCount = DB::table('attendance')->where('user_id', '=', $user->user_id)->where('course_id', '=', $request->code)->where('status', '=', 'Tardy')->count();
                    $courseData = DB::table('courses')->where('code', '=', $request->code)->get();
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
                    
                        //$link = "<a href=\"" . route('AttendanceClassStudentIn')   .     "?code=$course->course_id\">$classData->name</a>";
                    }
                    $data .= "<tr><td>$name->name</td><td>$count</td></tr>";
                }
            }
        }
    }
        $data .= "</table>";

        return view('attendance', ['data'=>$data, 'header'=>$header]);
    }
}
