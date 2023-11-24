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
use Carbon\Carbon;
use App\Mail\Register;
use App\Mail\Notification;
use Mail;

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

        $create = new VendorDetail;
        $create->user_id = $user->id;
        $create->business_type = $request->business_type;
        $create->company_name = $request->name;
        $create->save();


        $content = [
            'subject' => 'Your account has been created - Transcending Black Excellence.',
            'body' => "Dear ".$request->name.", <br> <br>

            Thank you for registering with Transcending Black Excellence. We're excited to have you as a part of our community. Your journey with us begins now! <br> <br>

            **Confirmation Details:** <br>
            - Username: ".$request->name." <br>
            - Email: ".$request->email." <br>
            - Date of Registration: ".Carbon::now()." <br> <br>

            Please be patient till we review & approve your account. You’ll get another welcome email once your account is approved. <br>

            We're here to help. If you encounter any issues or have questions, feel free to contact our support team at Support@tbe-web.com or visit our Help Center for more information. <br>

            Thank you for choosing Transcending Black Excellence. We look forward to serving you! <br> <br>

            Best Regards, <br>
            Team Transcending Black Excellence
            "
        ];

        $test = Mail::to($request->email)->send(new Register($content));

        $content2 = [
            'subject' => 'New Account Request - Review Required!',
            'body' => "Hello Timothy, <br> <br>

            A new account request has been submitted on TBE’'s platform.  <br> <br>

            **Request Details:** <br>
            - Username: ".$request->name." <br>
            - Email: ".$request->email." <br>
            - Date of Registration: ".Carbon::now()." <br> <br>

            To review and approve this request, please log in to the admin panel using the following link:
            https://app.tbe-web.com/admin-login
            <br> <br>

            By TBE Admin Panel.
            "
        ];

        $test2 = Mail::to('Timothy@tbe-web.com')->send(new Notification($content));

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





        event(new Registered($user));

        Auth::login($user);

        if ($request->type == 'vendor') {
            # code...





            $accountSid = 'ACddfbd0e90ee11c51c3aa02171f7737d4';
            $authToken = '5e70c7e6bb0f667a13c8ff7466c771a8';
            $twilioNumber = '+14846737439';
            $lineBreak = "\n\n";
            $message = 'Your OTP for verification is: '.$otp.'.
Please enter this code to complete your verification process.
- Transcending Black Excellence';
            // $to = $user->mobile_number->country_code.decrypt($user->mobile_number->number);
            $to = '+'.Auth::user()->phone;
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

        $content = [
            'subject' => 'Your account has been created - Transcending Black Excellence.',
            'body' => "Dear ".$request->name.", <br> <br>

            Thank you for registering with Transcending Black Excellence. We're excited to have you as a part of our community. Your journey with us begins now! <br> <br>

            **Confirmation Details:** <br>
            - Username: ".$request->name." <br>
            - Email: ".$request->email." <br>
            - Date of Registration: ".Carbon::now()." <br> <br>

            Please be patient till we review & approve your account. You’ll get another welcome email once your account is approved. <br>

            We're here to help. If you encounter any issues or have questions, feel free to contact our support team at Support@tbe-web.com or visit our Help Center for more information. <br>

            Thank you for choosing Transcending Black Excellence. We look forward to serving you! <br> <br>

            Best Regards, <br>
            Team Transcending Black Excellence
            "
        ];

        $test = Mail::to($request->email)->send(new Register($content));

        // dd($test);

        event(new Registered($user));

        Auth::login($user);

        $accountSid = 'ACddfbd0e90ee11c51c3aa02171f7737d4';
        $authToken = '5e70c7e6bb0f667a13c8ff7466c771a8';
        $twilioNumber = '+14846737439';
        $lineBreak = "\n\n";
        $message = 'Your OTP for verification is: '.$otp.'.
Please enter this code to complete your verification process.
- Transcending Black Excellence';
        // $to = $user->mobile_number->country_code.decrypt($user->mobile_number->number);
        $to = '+'.Auth::user()->phone;
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
        dd($add);
        $add->founder_name = $request->founder_name;
        $add->website = $request->website;
        $add->country_id = $request->country_id;
        $add->state_id = $request->state_id;
        $add->npo_category_id = $request->npo_category_id;
        $add->address = $request->address;
        $add->address_latitude = $request->address_latitude;
        $add->address_longitude = $request->address_longitude;
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
