<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HealthFacilities extends Model
{
    use HasFactory;
    protected $table = 'health_facilities';
    protected $primaryKey = 'properties_id';



    public static function getHospitalsOrderByState()
    {

        //raw query to insert
        //query builder
        $result = DB::table('health_facilities')->select(DB::raw(' *, COUNT(properties_id) AS facility_number, COUNT(DISTINCT properties_lga_name) AS lga_count'))->groupBy('properties_state_name')->orderBy('properties_state_name')->get();

        return $result;
    }

    public static function facility_number()
    {
        return DB::table('health_facilities')->count();
    }

    public static function functional_facilities()
    {
        return DB::table('health_facilities')->where('properties_functional_status', '=', 'Functional')->orWhere('properties_functional_status', '=', 'Partially Functional')->count();
    }

    public static function prep_applicant_count()
    {
        return DB::table('applicants')->count();
    }

    public static function getHospitalsByState()
    {
        //raw query to insert
        //query builder
        $result = DB::table('health_facilities')->select(DB::raw(' *, COUNT(properties_id) AS facility_number, COUNT(DISTINCT properties_lga_name) AS lga_count'))->groupBy('properties_state_name')->orderBy('properties_state_name')->get();

        return $result;
    }

    public static function getStates()
    {
        return  DB::table('states')->get();
    }

    public static function registerApplicant($request)
    {
        // dd($request);
        // exit;
        $result = DB::table('applicants')->insert([
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'middlename' => $request['middlename'],
            'age' => $request['age'],
            'next_of_kin' => $request['next_of_kin'],
            'email' => $request['email'],
            'sponsor' => $request['sponsor'],
            'residential_state' => $request['residential_state'],
            'residential_lga' => $request['residential_lga'],
            'appointement_date' => $request['appointement_date'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return $result;
    }

    public static function getlgas($state_code)
    {
        return DB::table('lga')->where('state_code', '=', $state_code)->get();
    }
}
