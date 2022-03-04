<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditForwarder extends Controller
{
    public function index(Request $request)
    {
        $name = $request->name;
        $classID = $request->classID;
        $studentID = $request->studentID;

        return view('edit', ['name'=>$name, 'classID'=>$classID, 'studentID'=>$studentID]);
    }
}
