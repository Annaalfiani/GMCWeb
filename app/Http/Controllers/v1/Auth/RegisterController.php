<?php

namespace App\Http\Controllers\v1\Auth;

use App\Customer;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:5|regex:/^[\pL\s\-]+$/u',
            'email' => 'email|required|unique:customers',
            'password' => 'required',
        ]);

            if ($validator->fails()){
                return response()->json([
                    'message' => $validator->errors(),
                    'status' => false,
                ], 401);
            }
            $data = new Customer();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            //$data->telp = $request->telp;
            $data->api_token = Str::random(80);
            $data->save();
            $data->sendApiEmailVerificationNotification();
            $message = "Cek Email Anda, Verifikasi Dahulu";
            //$message = "Cek Email Anda, Verifikasi Dahulu";

            return response()->json([
                'message' => $message,
                'status' => true,
                'data' => $data
            ], 200);
    }
}