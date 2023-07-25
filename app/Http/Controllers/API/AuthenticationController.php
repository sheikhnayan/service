<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Hash;
use Illuminate\Validation\Rules;
use Laravel\Sanctum\PersonalAccessToken;


class AuthenticationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $check = User::where('phone',$request->phone)->first();

        if ($check) {
            # code...
            $password = Hash::check($request->password, $check->password);

            if ($password == true) {
                # code...
                $token =  $check->createToken('Login-Token');

                return $token;
            }else{
                return 'Wrong Password';
            }
        }else{
            return 'Invalid Credentials';
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'type' => 'user',
            'password' => Hash::make($request->password),
        ]);

        $token =  $user->createToken('Login-Token');

        return $token;
    }
}
