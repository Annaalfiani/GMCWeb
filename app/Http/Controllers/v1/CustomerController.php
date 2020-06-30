<?php

namespace App\Http\Controllers\v1;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function profil()
    {
        $profil = Customer::where('id', Auth::guard('api')->user()->id)->first();

        return response()->json([
            'mesage' => 'aaa',
            'status' => true,
            'data' => $profil
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::guard('api')->user();
        $user->name = $request->name;
        $user->password = $request->password;
        $user->save();
    }
}
