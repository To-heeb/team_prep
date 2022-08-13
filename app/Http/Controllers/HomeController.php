<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthFacilities;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{


    public function states()
    {

        $hospitals  = HealthFacilities::getHospitalsOrderByState();
        //dd($hospitals);
        return view('landing.state', compact('hospitals'));
    }

    public function search(Request $request)
    {

        $state_code =  $request->query('state');
        $state_name = HealthFacilities::select("properties_state_name")->where('properties_state_code', $state_code)->first();
        $hospitals = HealthFacilities::where('properties_state_code', $state_code)->get();
        $total_count = "";
        $total_number_administered_prep = "";
        //dd($hospitals);
        return view('landing.hospital', compact('hospitals', 'state_name', 'total_count', 'total_number_administered_prep'));
    }
}
