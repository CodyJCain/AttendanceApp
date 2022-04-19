<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceProfessor extends Controller
{
    public function index(Request $request)
    {
        $header = "Attendance";
        return view('AttendanceSelect', ['header'=>$header]);
    }
}
