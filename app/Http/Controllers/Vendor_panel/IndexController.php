<?php

namespace App\Http\Controllers\Vendor_panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Support;
use App\Models\State;
use App\Models\Visit;
use Twilio\Rest\Client;
use Auth;
use Hash;

class IndexController extends Controller
{
    public function profile()
    {
        return view('vendor_panel.profile');
    }

    public function profile_update(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();
        if (Auth::user()->type == 'vendor') {
            # code...
            $user->name = $request->founder_name;
        }else {
            # code...
            $user->name = $request->name;
        }
        $user->phone = $request->phone;
        if ($request->password != null) {
            # code...

            $check = Hash::check($request->old_password, $user->password);

            if ($check) {
                # code...
                $password = Hash::make($request->password);
                $user->password = $password;
            }else {
                return back()->with('failure','Invalid Old Password !');
            }

        }
        $user->update();

        $vendor = Auth::user()->vendor;
        $vendor->company_name = $request->company_name;
        $vendor->founder_name = $request->founder_name;
        $vendor->country_id = $request->country_id;
        $vendor->state_id = $request->state_id;
        $vendor->website = $request->donation_link;
        $vendor->address = $request->address;

        if (isset($request->image)) {
            # code...
            $imageName = time().'.'.$request->image->extension();   
    
            $image = $request->image->storeAs('public/product', $imageName);

            $image = str_replace('public','',$image);

            $vendor->logo = $image;

        }

        $vendor->update();
        
        return redirect(route('profile'));
    }

    public function get_states($country)
    {
        return $data = State::where('country_id',$country)->get();
    }

    public function notification()
    {
        $data = Visit::where('user_id',Auth::user()->id)->latest()->get();

        return view('vendor_panel.notification',compact('data'));
    }

    // public function preferred_vendor()
    // {
    //     return view('vendor_panel.preferred_vendor');
    // }

    public function subscription()
    {
        $check = Auth::user()->vendor->business_type;
        if ($check == 'business') {
            # code...
            return view('vendor_panel.buy-subscription');
        }else {
            # code...
            return view('vendor_panel.buy-subscription-2');
        }
    }

    public function otp()
    {
        return view('vendor_panel.otp');
    }

    public function otp_submit()
    {
        $accountSid = 'ACddfbd0e90ee11c51c3aa02171f7737d4';
        $authToken = '4fe31c6d701daf7cbb25772b80e4202f';
        $twilioNumber = '+14846737439';
        $lineBreak = "\n\n";
        $message = 'asd';
        // $to = $user->mobile_number->country_code.decrypt($user->mobile_number->number);
        $to = '+8801980265838';
        $client = new Client($accountSid, $authToken);
        try {
            $client->messages->create(
                $to,
                [
                    "body" => $message,
                    "from" => $twilioNumber
                ]
            );
            Log::info('Message sent to ' . $twilioNumber);
        } catch (TwilioException $e) {
            Log::error(
                'Could not send SMS notification.' .
                ' Twilio replied with: ' . $e
            );
        }


    }

    public function final_registration()
    {
        
        if (Auth::user()->type == 'user') {
            # code...
            return redirect(route('user.index'));
        } else {
            # code...
            return view('vendor_panel.final-registration');   
        }
        

    }

    public function review()
    {
        return view('vendor_panel.review');
    }

    public function analytics()
    {
        return view('vendor_panel.analytics');
    }

    public function support()
    {
        return view('support');
    }

    public function support_submit(Request $request)
    {
        $add = new Support;
        $add->user_id = Auth::user()->id;
        $add->email = $request->email;
        $add->issue = $request->issue;
        $add->description = $request->description;
        $add->save();

        return back()->with('success',' Your request has been sent! We will get back to you.');
    }
}
