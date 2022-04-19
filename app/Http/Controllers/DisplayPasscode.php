<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisplayPasscode extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $header = "Passcode";
        $user = auth()->user();
        $milliseconds = round(microtime(true) * 1000);
        $currentCourses = DB::table('classes')->where('timeStart', '<', $milliseconds)->where('timeEnd', '>', $milliseconds)->where('instructor_id', '=', $user->id)->get();
        foreach($currentCourses as $currentCourse)
        {
            $passcodes = DB::table('passcodes')->where('class_id', '=', $currentCourse->id)->get();
            foreach($passcodes as $passcode)
            {
                $data = $passcode->passcode;
            }
        }
        return view('attendance', ['data'=>$data, 'header'=>$header]);
    }
}
