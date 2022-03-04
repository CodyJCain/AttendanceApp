<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationDateList extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = auth()->user();
        $data = "<h3>Date</h3> </br>";
        $milliseconds = round(microtime(true) * 1000);
        $code = $request->code;
        $classes = DB::table('classes')->where('instructor_id', '=', $user->id)->where('course_id', '=', $code)->where('timeStart', '>', $milliseconds)->get();

        foreach($classes as $class)
        {
            $data .= "<a href=\"/SetLocationForwarder?classID=$class->id\">$class->class_date</a></br>";
            //$data .= "$class->class_date </br>";
        }

        return view('attendance', ['data'=>$data]);
    }
}