<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GPSController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $timestamp = $request->timestamp;
        $user = auth()->user();

        $courses = DB::table('courses_users')->where('user_id', '=', $user->id)->get(); 

        foreach($courses as $course){
            $classPeriod = DB::table('classes')->where('timeStart', '<', $timestamp)->where('timeEnd', '>', $timestamp)->where('course_id', '=', $course->course_id)->get();
            if($classPeriod->count() != 0)
            {
                foreach($classPeriod as $class)
                {
                    $latitudeMax = $class->latitude_max;
                    $latitudeMin = $class->latitude_min;
                    $longitudeMax = $class->longitude_max;
                    $longitudeMin = $class->longitude_min;
                    $class_id = $class->id;
                }
                $currentCourse = $course;
            }
        }
        
        if(isset($latitudeMax) && isset($latitudeMin) && isset($longitudeMax) && isset($longitudeMin))
        {
            if($latitude < $latitudeMax && $latitude > $latitudeMin && $longitude < $longitudeMax && $longitude > $longitudeMin)
            {
                DB::table('attendance')->updateOrInsert(['class_id' => $currentCourse->course_id, 'user_id' => $user->id, 'class_id' => $class_id, 'course_id' => $currentCourse->course_id], ['status' => 'Present', 'sign_date' => $timestamp]);
                return view('success');
            }
            else
            {
                return view('failure');
            }
        }
        else
        {
            return view('failure');
        }
    }
}
?>
