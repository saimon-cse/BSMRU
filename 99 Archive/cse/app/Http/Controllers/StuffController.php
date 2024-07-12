<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StuffController extends Controller
{

    //
    public function StuffDashboard(){
        return view ('stuff.dashboard');
    }
}
