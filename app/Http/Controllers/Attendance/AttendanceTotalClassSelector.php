<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceTotalClassSelector extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $header = "Select a Class";
        
        $user = auth()->user();

        $data = "<table><tr><th>Class Name</th><th>Class Section</th></tr>";

        $classes = DB::table('courses')->where('instructor_id', '=', $user->id)->get();

        foreach($classes as $class)
        {
            $link = "<a href=\"/AttendanceTotals?code=$class->code\">$class->code</a>";
            $data .= "<tr><td>$class->name</td><td>$link</td></tr>";
        }

        return view('attendance', ['data'=>$data, 'header'=>$header]);
    }
}