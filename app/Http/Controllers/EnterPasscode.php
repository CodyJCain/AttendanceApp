<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnterPasscode extends Controller
{
    public function index(Request $request)
    {
        $header = "Passcode";
        return view('EnterPasscode', ['header'=>$header]);
    }
}
