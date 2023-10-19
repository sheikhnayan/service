<?php

namespace App\Http\Controllers\Vendor_panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Support;
use App\Models\State;
use App\Models\Visit;
use App\Models\Product;
use App\Models\Service;
use App\Models\Event;
use App\Models\Campaign;
use App\Models\Food;
use Twilio\Rest\Client;
use \KMLaravel\GeographicalCalculator\Facade\GeoFacade;
use Auth;
use Hash;
use Session;
use DB;

class IndexController extends Controller
{

    public function dashboard()
    {
        $product = Product::where('user_id',Auth::user()->id)->latest()->limit(4)->get();

        $service = Service::where('user_id',Auth::user()->id)->latest()->limit(4)->get();

        $food = Food::where('user_id',Auth::user()->id)->latest()->limit(4)->get();

        $event = Event::where('user_id',Auth::user()->id)->latest()->limit(4)->get();

        $campaign = Campaign::where('user_id',Auth::user()->id)->latest()->limit(4)->get();

        // dd($event);

        return view('vendor_panel.dashboard',compact('product','service','food','event','campaign'));
    }

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


        if (Auth::user()->type == 'vendor') {

            $vendor = Auth::user()->vendor;
            $vendor->company_name = $request->company_name;
            $vendor->founder_name = $request->founder_name;
            $vendor->country_id = $request->country_id;
            $vendor->state_id = $request->state_id;
            $vendor->website = $request->website;
            $vendor->donation_link = $request->donation_link;
            $vendor->address = $request->address;

            if (isset($request->image)) {
                # code...
                $imageName = time().'.'.$request->image->extension();   
        
                $image = $request->image->storeAs('public/product', $imageName);

                $image = str_replace('public','',$image);

                $vendor->logo = $image;

            }

            $vendor->update();
        }
        
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

    public function otp_submit(Request $request)
    {
        $otp = $request->otp;

        $vendor = Auth::user();
        
        if ($vendor->otp == $otp) {
            # code...
            $vendor->otp_status = 1;
            $vendor->update();

            if (Auth::user()->type == 'vendor') {
                # code...
                return redirect(route('final-registration'))->with('success','OTP Verified successfully!');
            } else {
                # code...
                return redirect(route('user.index'))->with('success','OTP Verified successfully!');
            }
            

        }else {
            # code...
            return back()->with('failure','Invalid OTP. Please try again!');
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

        return back()->with('success','We have received your support request. very soon our support team will get back to you!');
    }

    public function search_main($value)
    {
        $results = '';

        $lat = Session::get('lat');
            
        $lon = Session::get('lng');

        $product = Product::where('name','like','%'.$value.'%')->with('vendor')->with('vendor.vendor')->get();

        $products = [];
    
            foreach ($product as $key => $value) {
                # code...
                $distance = GeoFacade::setPoint([$lat, $lon])
                    ->setOptions(['units' => ['km']])
                    // you can set unlimited lat/long points.
                    ->setPoint([$value->vendor->vendor->address_latitude, $value->vendor->vendor->address_longitude])
                    // get the calculated distance between each point
                    ->getDistance();
                    
                if ($distance['1-2']['km'] <= 10) {
                    # code...
                    array_push($products,$value);
                }

            }

        $service = Service::where('name','like','%'.$value.'%')->with('vendor')->with('vendor.vendor')->get();

        $services = [];
    
            foreach ($service as $key => $value) {
                # code...
                $distance = GeoFacade::setPoint([$lat, $lon])
                    ->setOptions(['units' => ['km']])
                    // you can set unlimited lat/long points.
                    ->setPoint([$value->vendor->vendor->address_latitude, $value->vendor->vendor->address_longitude])
                    // get the calculated distance between each point
                    ->getDistance();
                    
                if ($distance['1-2']['km'] <= 10) {
                    # code...
                    array_push($services,$value);
                }

            }

        $food = Food::where('name','like','%'.$value.'%')->with('vendor')->with('vendor.vendor')->get();

        $foods = [];
    
            foreach ($food as $key => $value) {
                # code...
                $distance = GeoFacade::setPoint([$lat, $lon])
                    ->setOptions(['units' => ['km']])
                    // you can set unlimited lat/long points.
                    ->setPoint([$value->vendor->vendor->address_latitude, $value->vendor->vendor->address_longitude])
                    // get the calculated distance between each point
                    ->getDistance();
                    
                if ($distance['1-2']['km'] <= 10) {
                    # code...
                    array_push($foods,$value);
                }

            }

        $event = Event::where('name','like','%'.$value.'%')->with('vendor')->with('vendor.vendor')->get();

        $events = [];
    
            foreach ($event as $key => $value) {
                # code...
                $distance = GeoFacade::setPoint([$lat, $lon])
                    ->setOptions(['units' => ['km']])
                    // you can set unlimited lat/long points.
                    ->setPoint([$value->vendor->vendor->address_latitude, $value->vendor->vendor->address_longitude])
                    // get the calculated distance between each point
                    ->getDistance();
                    
                if ($distance['1-2']['km'] <= 10) {
                    # code...
                    array_push($events,$value);
                }

            }

        $data['product'] = $product;

        $data['service'] = $service;

        $data['food'] = $food;

        $data['event'] = $event;


        return $data;


    }
}
