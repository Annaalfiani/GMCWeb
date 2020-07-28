<?php

namespace App\Http\Controllers\manager\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

//    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:manager')->except('logout');
    }

    public function showLoginForm(){
        return view('auth_manager.login');
    }

    public function login(Request $request)
    {

        $rules =  [
            'email' => 'required',
            'password' => 'required|string|min:6',

        ];

        $message = [
            'required' => ':attribute tidak boleh kosong',
            'required|string|min:6' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah terdaftar',
            'min'   => ':attribut minimal :min',
        ];

        $this->validate($request, $rules, $message);

        $credential = [
            'email'   =>$request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('manager')->attempt($credential, $request->remember)){
            return redirect()->intended(route('managerdashboard.index'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));

    }

    public function logout()
    {
        Auth::guard('manager')->logout();
        return redirect()->route('manager.login');
    }

}
