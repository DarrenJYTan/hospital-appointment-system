<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:doctor')->except('logout');
        $this->middleware('guest:nurse')->except('logout');
        $this->middleware('guest:patient')->except('logout');
    }

    public function doctorLoginForm()
    {
        return view('auth.login', ['url' => 'doctor']);
    }

    public function doctorAuthentication(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/doctor/home');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function nurseLoginForm()
    {
        return view('auth.login', ['url' => 'nurse']);
    }

    public function nurseAuthentication(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('nurse')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/nurse/home');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function patientLoginForm()
    {
        return view('auth.login', ['url' => 'patient']);
    }

    public function patientAuthentication(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('patient')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/patient/home');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
}
