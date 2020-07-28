<?php

namespace App\Http\Controllers\admin\Auth;

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
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm(){
        return view('auth_admin.login');
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
        ];

        $this->validate($request, $rules, $message);

        $credential = [
          'email'   =>$request->email,
          'password' => $request->password,
        ];

        if (Auth::guard('admin')->attempt($credential, $request->remember)){
            return redirect()->intended(route('admindashboard.index'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

}
