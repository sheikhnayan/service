<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\VendorDetail;
use Illuminate\Support\Facades\Http;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    public function create_user()
    {
        return view('auth.register2');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'type' => $request->type,
            'type' => $request->type,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->type == 'vendor') {
            $apiURL = 'https://connect.squareupsandbox.com/v2/customers';

            $postInput = [
    
                'company_name' => $request->name,
    
                'email_address' => $request->email,
    
                'phone_number' => '+88'.$request->phone
    
            ];
    
      
    
            $headers = [
    
                'Square-Version' => '2023-06-08',

                'Authorization' => 'Bearer EAAAECLQEKR3dVZ6PgGI6VoZa1LzXaqgtqjgKg_Re-NyPafaFVoBhcsmdxLCBcQU'
    
            ];
    
      
    
            $response = Http::withHeaders($headers)->withOptions(["verify"=>false])->post($apiURL, $postInput);
    
      
    
            $statusCode = $response->status();
    
            $responseBody = json_decode($response->getBody(), true);

            $customer_id = $responseBody['customer']['id'];


            // dd($responseBody['customer']['id']);

            $create = new VendorDetail;
            $create->user_id = $user->id;
            $create->business_type = $request->business_type;
            $create->company_name = $request->name;
            $create->customer_id = $customer_id;
            $create->save();


    
         
    
        }

        event(new Registered($user));

        Auth::login($user);

        if ($request->type == 'vendor') {
            # code...
            return redirect(RouteServiceProvider::OTP);
        } else {
            # code...
            return redirect(RouteServiceProvider::Home);
        }
        

    }

    public function store_user(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'type' => $request->type,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);


        return redirect(RouteServiceProvider::OTP);

        

    }

    public function final_registration(Request $request)
    {

        $imageName = time().'.'.$request->logo->extension();   

        $image = $request->logo->storeAs('public/vendor', $imageName);

        $document = str_replace('public','',$image);

        $add = VendorDetail::where('user_id',Auth::user()->id)->first();
        $add->founder_name = $request->founder_name;
        $add->website = $request->website;
        $add->country_id = $request->country_id;
        $add->state_id = $request->state_id;
        $add->npo_category_id = $request->npo_category_id;
        $add->address = $request->address;
        $add->document = $document;
        $add->status = 0;
        $add->update();


        return redirect(RouteServiceProvider::Vendor);

    }

    public function admin_login()
    {
        return view('auth.admin-login');
    }
}
