<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SetLocationForwarder extends Controller
{
    public function index(Request $request)
    {
        $classID = $request->classID;
        $data = "";

        $locations = DB::table('locations')->get();

        foreach($locations as $location)
        {
            $data .= "<option value=\"$location->id\">$location->name</option>";
        }
        return view('location', ['data'=>$data, 'classID'=>$classID]);
    }
}