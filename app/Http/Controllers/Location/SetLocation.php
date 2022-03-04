<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SetLocation extends Controller
{
    public function index(Request $request)
    {
        $classID = $request->classID;
        $locationID = $request->locations;
        $locations = DB::table('locations')->where('id', '=', $locationID)->get();
        foreach($locations as $location)
        {
            DB::table('classes')->updateOrInsert(['id' => $classID], ['latitude_min' => $location->latitude_min, 'latitude_max' => $location->latitude_max, 'longitude_min' => $location->longitude_min, 'longitude_max' => $location->longitude_max]);
        }
        return view('success');
        }
}
