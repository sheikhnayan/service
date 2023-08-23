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
use Twilio\Rest\Client;

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
        // dd($request->all());

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $otp = mt_rand(0,999999);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'type' => $request->type,
            'type' => $request->type,
            'email' => $request->email,
            'otp' => $otp,
            'password' => Hash::make($request->password),
        ]);

        if ($request->type == 'vendor') {
            // $apiURL = 'https://connect.squareupsandbox.com/v2/customers';

            // $postInput = [
    
            //     'company_name' => $request->name,
    
            //     'email_address' => $request->email,
    
            //     'phone_number' => '+88'.$request->phone
    
            // ];
    
      
    
            // $headers = [
    
            //     'Square-Version' => '2023-06-08',

            //     'Authorization' => 'Bearer EAAAECLQEKR3dVZ6PgGI6VoZa1LzXaqgtqjgKg_Re-NyPafaFVoBhcsmdxLCBcQU'
    
            // ];
    
      
    
            // $response = Http::withHeaders($headers)->withOptions(["verify"=>false])->post($apiURL, $postInput);
    
      
    
            // $statusCode = $response->status();
    
            // $responseBody = json_decode($response->getBody(), true);

            // $customer_id = $responseBody['customer']['id'];


            // dd($responseBody['customer']['id']);

            
            
            
            
            
        }
        
        

        $create = new VendorDetail;
        $create->user_id = $user->id;
        $create->business_type = $request->business_type;
        $create->company_name = $request->name;
        $create->save();

        event(new Registered($user));

        Auth::login($user);

        if ($request->type == 'vendor') {
            # code...

        



            $accountSid = 'ACddfbd0e90ee11c51c3aa02171f7737d4';
            $authToken = '8375277c18f56a86a2ed4615f31cb469';
            $twilioNumber = '+14846737439';
            $lineBreak = "\n\n";
            $message = 'Your OTP for verification is: '.$otp.'. 
Please enter this code to complete your verification process.
- Transcending Black Excellence';
            // $to = $user->mobile_number->country_code.decrypt($user->mobile_number->number);
            $to = '+88'.Auth::user()->phone;
            $client = new Client($accountSid, $authToken);
            try {
                $client->messages->create(
                    $to,
                    [
                        "body" => $message,
                        "from" => $twilioNumber
                    ]
                );
    
            return redirect(RouteServiceProvider::OTP)->with('success','OTP is sent to '.Auth::user()->phone.'.');
            
            } catch (TwilioException $e) {
                return back()->with('failur',$e);
            }

        // return redirect(RouteServiceProvider::OTP);

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
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $otp = mt_rand(0,999999);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'type' => $request->type,
            'email' => $request->email,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'otp' => $otp,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        $accountSid = 'ACddfbd0e90ee11c51c3aa02171f7737d4';
        $authToken = '8375277c18f56a86a2ed4615f31cb469';
        $twilioNumber = '+14846737439';
        $lineBreak = "\n\n";
        $message = 'Your OTP for verification is: '.$otp.'. 
Please enter this code to complete your verification process.
- Transcending Black Excellence';
        // $to = $user->mobile_number->country_code.decrypt($user->mobile_number->number);
        $to = '+88'.Auth::user()->phone;
        $client = new Client($accountSid, $authToken);
        try {
            $client->messages->create(
                $to,
                [
                    "body" => $message,
                    "from" => $twilioNumber
                ]
            );

        return redirect(RouteServiceProvider::OTP)->with('success','OTP is sent to '.Auth::user()->phone.'.');
        
        } catch (TwilioException $e) {
            return redirect(RouteServiceProvider::OTP)->with('failur',$e);
        }


        // return redirect(RouteServiceProvider::OTP);

        

    }

    public function final_registration(Request $request)
    {
        $document = '';

        foreach ($request->logo as $key => $value) {
            # code...
            $imageName = time().'.'.$value->extension();   
    
            $image = $value->storeAs('public/vendor', $imageName);
    
            $document .= str_replace('public','',$image).',';
        }

        $logo = time().'.'.$request->image->extension();   
    
        $log = $request->image->storeAs('public/vendor', $logo);
    
        $logo = str_replace('public','',$log);

        $add = VendorDetail::where('user_id',Auth::user()->id)->first();
        $add->founder_name = $request->founder_name;
        $add->website = $request->website;
        $add->country_id = $request->country_id;
        $add->state_id = $request->state_id;
        $add->npo_category_id = $request->npo_category_id;
        $add->address = $request->address;
        $add->document = $document;
        $add->logo = $logo;
        $add->status = 0;
        $add->update();


        return redirect(RouteServiceProvider::Vendor);

    }

    public function admin_login()
    {
        return view('auth.admin-login');
    }
}
