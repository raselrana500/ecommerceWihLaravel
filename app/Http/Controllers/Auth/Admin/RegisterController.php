<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Models\User;
use App\Models\Division;
use App\Models\District;
use App\Notifications\VerifyRegistration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * @override
     *show registration form
     *Display the Division and District
     * @return void
     */
    public function showRegistrationForm()
    {
        $divisions=Division::orderBy('priority','asc')->get();
        $districts=District::orderBy('division_id','asc')->get();
        return view('auth.register',compact('divisions','districts'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'phone_no' => 'required|max:15',
            'division_id' => 'required|numeric',
            'district_id' => 'required|numeric',
            'email' => 'required|string|email|max:100|unique:users',
            'street_address' => 'required|max:200',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(Request $request)
    {
        $user =  User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => str_slug($request->first_name.$request->last_name),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'phone_no' => $request->phone_no,
            'street_address' => $request->street_address,
            'ip_address' => request()->ip(),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => str_random(50),
            'status' => 0,
        ]);

        $user->notify(new VerifyRegistration($user,$user->remember_token));
        session()->flash('success','A confirmation mail has sent to you...please check and verify your email address.');
        return redirect('/');

    }
}
