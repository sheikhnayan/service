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
                return response('Wrong Password', 401);
            }
        }else{
            return response('Invalid Credentials', 401);
        }
    }

    public function log_out(Request $request)
    {
        $token = PersonalAccessToken::findToken($request->header('TOKEN'));

        $user = $token->tokenable;

        $user->tokens()->where('id', $token->id)->delete();

        return response('Successfully Logged Out!', 200);
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

    public function profile(Request $request)
    {

        $token = PersonalAccessToken::findToken($request->header('TOKEN'));

        $user = $token->tokenable;

        return $user;
    }

    public function profile_update(Request $request)
    {

        $check_phone = User::where('phone',$request->phone)->count();

        if ($check_phone > 0) {
            # code...

            return response('Phone Number Already Taken!', 401);
        }

        $check_email = User::where('email',$request->email)->count();

        if ($check_email > 0) {
            # code...

            return response('Email Already Taken!', 401);
        }

        $token = PersonalAccessToken::findToken($request->header('TOKEN'));

        $user = $token->tokenable;

        $user->name = $request->name;

        $user->email = $request->email;

        $user->phone = $request->phone;
        
        $user->update();

        $data['status'] = 'Profile Updated Successfully!';
        $data['data'] = $user;

        return $data;
    }

    public function change_password(Request $request)
    {
        $token = PersonalAccessToken::findToken($request->header('TOKEN'));

        $user = $token->tokenable;

        $check = Hash::check($request->previous_password, $user->password);

        if ($check == true) {
            # code...

            if ($request->new_password == $request->confirm_new_password) {
                # code...

                $user->password = Hash::make($request->new_password);
                $user->update();

                $data['status'] = 'Password Changed Successfully!';

                $data['data'] = $user;

                return $data;

            }else {
                # code...
                return response('New Password and Confirm Password don not match!', 403);

            }
        }else {
            # code...
            return response('Incorrect Previous Password!', 403);

        }
    }
}
