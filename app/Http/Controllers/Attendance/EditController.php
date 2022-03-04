<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status;
        $classID = $request->classID;
        $studentID = $request->studentID;

        $courseID = DB::table('classes')->where('id', '=', $classID)->get();

        foreach($courseID as $course_id)
        {
            DB::table('attendance')-> updateOrInsert(['class_id' => $classID, 'user_id' => $studentID, 'course_id' => $course_id->course_id], ['status' => $status]); 
        }     

        return redirect("/AttendanceView?classID=$classID");

    }
}
