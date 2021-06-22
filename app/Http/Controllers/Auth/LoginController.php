<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use App\Notifications\VerifyRegistration;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email',$request->email)->first();
        if($user->status == 1){
            if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password ],$request->remember)){
                return redirect()->intended(route('index'));
            }else{
                session()->flash('stricky_error','Email or Password Not Matched.please try again');
                return redirect()->route('login');
            }            
        }else{
            if(!is_null($user)){
                $user->notify(new VerifyRegistration($user,$user->remember_token));
                session()->flash('success','A New confirmation mail has sent to you...please check and verify your email address.');
                return redirect('/');
            }else{
                session()->flash('stricky_error','A New confirmation mail has sent to you...please check and verify your email address.');
                return redirect()->route('login');
            }
    }
    }
}
