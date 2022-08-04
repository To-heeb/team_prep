<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\User;
use PHPUnit\TextUI\Help;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\HealthFacilities;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $hospitals  = HealthFacilities::getHospitalsOrderByState();
        //dd($hospitals);
        $facilityCount = HealthFacilities::facility_number();
        $functional_facilities = HealthFacilities::functional_facilities();
        $total_prep_applicant = HealthFacilities::prep_applicant_count();
        return view('admin.index', compact('hospitals', 'facilityCount', 'total_prep_applicant', 'functional_facilities'));
    }

    public function search(Request $request)
    {
        //
        $state_code =  $request->query('state');
        $state_name = HealthFacilities::select("properties_state_name")->where('properties_state_code', $state_code)->first();
        $hospitals = HealthFacilities::where('properties_state_code', $state_code)->get();
        $total_count = "";
        $total_number_administered_prep = "";
        //dd($hospitals);
        return view('admin.singlestate', compact('hospitals', 'state_name', 'total_count', 'total_number_administered_prep'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedFormFields = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $validatedFormFields['password'] = bcrypt($validatedFormFields['password']);

        // Create User
        $user = User::create($validatedFormFields);

        if ($user) {
            return redirect('/login')->with('status', 'success');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    // Authenticate User/ Log In User
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //dd($formFields);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerateToken();
            $request->session()->put(['email' =>  $formFields['email'], 'username' => User::select("name")->where('email', $formFields['email'])->first()->name]);
            //dd($request->session()->all());
            return redirect('admin/dashboard')->with('message', 'You are now logged in!');
        }

        return redirect('/login')->with('status', 'error');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function prepform()
    {
        $states = HealthFacilities::getStates();
        //dd($states);
        return view('admin.application', compact('states'));
    }

    public function prepformsubmission(Request $request)
    {
        //dd($request);
        $validatedFormFields = $request->validate([
            'firstname' => 'required|max:100',
            'lastname' => 'required|max:100',
            'middlename' => 'nullable|max:100',
            'age' => 'required|numeric',
            'next_of_kin' => 'nullable|max:200',
            'email' => 'nullable|email|unique:users',
            'sponsor' => 'nullable',
            'residential_state' => 'required',
            'residential_lga' => 'required',
            'appointment_date' => 'required',
        ]);

        //dd($validatedFormFields);

        // Register Prep Applicant
        $result = Applicant::create($validatedFormFields);
        //dd($result);

        if ($result) {
            $status = "success";
        } else {
            $status = "failed";
        }
        return redirect('admin/prepapplication')->with('status', $status);
        //$states = HealthFacilities::getStates();
    }

    public function prepapplicant()
    {
        $applicants  = Applicant::join('states', 'applicants.residential_state', '=', 'states.code')->orderBy('appointment_date', 'desc')->get();
        //dd($states);
        return view('admin.applicant', compact('applicants'));
    }

    public function getlgas(Request $request)
    {
        $lgas  = HealthFacilities::getlgas($request->state_code);
        //dd($hospitals);
        $result =  $lgas->toArray();
        return response()->json($result);
    }

    public function facilities()
    {

        $hospitals  = HealthFacilities::getHospitalsOrderByState();
        //dd($hospitals);
        return view('admin.facilities', compact('hospitals'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
