<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ServiceCategory;
use App\Models\FoodMenuCategory;
use App\Models\Event;
use App\Models\Campaign;
use App\Models\Product;
use App\Models\Service;
use App\Models\Food;
use App\Models\User;
use App\Models\Visit;
use App\Models\Review;
use App\Models\StartUp;
use App\Models\WishList;
use App\Models\StartUpCategory;
use App\Models\NPOCategory;
use App\Models\VendorDetail;
use \KMLaravel\GeographicalCalculator\Facade\GeoFacade;
use Auth;
use Session;
use DB;

class UserController extends Controller
{
    public function index()
    {
        $product = ProductCategory::all();

        $service = ServiceCategory::all();

        $food = FoodMenuCategory::all();

        $event = Event::limit(6)->get();

        return view('user.index',compact('product','service','food','event'));

    }

    public function product_category($id)
    {
        if ($id == 0) {
            $lat = Session::get('lat');

            $lon = Session::get('lng');

            $dat = Product::all();

            $data = [];

            foreach ($dat as $key => $value) {
                # code...
                $distance = GeoFacade::setPoint([$lat, $lon])
                    ->setOptions(['units' => ['km']])
                    // you can set unlimited lat/long points.
                    ->setPoint([$value->vendor->vendor->address_latitude, $value->vendor->vendor->address_longitude])
                    // get the calculated distance between each point
                    ->getDistance();

                if ($distance['1-2']['km'] <= 10) {
                    # code...
                    array_push($data,$value);
                }

            }
        }else{
            $lat = Session::get('lat');

            $lon = Session::get('lng');

            $dat = Product::where('category_id',$id)->get();

            $data = [];

            foreach ($dat as $key => $value) {
                # code...
                $distance = GeoFacade::setPoint([$lat, $lon])
                    ->setOptions(['units' => ['km']])
                    // you can set unlimited lat/long points.
                    ->setPoint([$value->vendor->vendor->address_latitude, $value->vendor->vendor->address_longitude])
                    // get the calculated distance between each point
                    ->getDistance();

                if ($distance['1-2']['km'] <= 10) {
                    # code...
                    array_push($data,$value);
                }

            }
        }

        $type = 'product';

        return view('user.category',compact('data','type'));
    }

    public function campaign_category($id)
    {
        $lat = Session::get('lat');

        $lon = Session::get('lng');

        $dat = VendorDetail::where('npo_category_id',$id)->get();


        $data = [];

        foreach ($dat as $key => $value) {
            # code...
            $distance = GeoFacade::setPoint([$lat, $lon])
                ->setOptions(['units' => ['km']])
                // you can set unlimited lat/long points.
                ->setPoint([$value->address_latitude, $value->address_longitude])
                // get the calculated distance between each point
                ->getDistance();

            if ($distance['1-2']['km'] <= 10) {
                # code...
                array_push($data,$value);
            }

        }


        $type = 'campaign';

        return view('user.campaign.category',compact('data','type'));
    }

    public function service_category($id)
    {
        if ($id == 0) {
            $lat = Session::get('lat');

            $lon = Session::get('lng');

            $dat = Service::all();

            $data = [];

            foreach ($dat as $key => $value) {
                # code...
                dd($value->vendor->vendor);
                $distance = GeoFacade::setPoint([$lat, $lon])
                    ->setOptions(['units' => ['km']])
                    // you can set unlimited lat/long points.
                    ->setPoint([$value->vendor->vendor->address_latitude, $value->vendor->vendor->address_longitude])
                    // get the calculated distance between each point
                    ->getDistance();

                if ($distance['1-2']['km'] <= 10) {
                    # code...
                    array_push($data,$value);
                }

            }
        }else{
            $lat = Session::get('lat');

            $lon = Session::get('lng');


            $dat = Service::where('category_id',$id)->get();

            $data = [];

            foreach ($dat as $key => $value) {
                # code...
                $distance = GeoFacade::setPoint([$lat, $lon])
                    ->setOptions(['units' => ['km']])
                    // you can set unlimited lat/long points.
                    ->setPoint([$value->vendor->vendor->address_latitude, $value->vendor->vendor->address_longitude])
                    // get the calculated distance between each point
                    ->getDistance();



                if ($distance['1-2']['km'] <= 10) {
                    # code...
                    array_push($data,$value);
                }

            }
        }

        $type = 'service';

        return view('user.category',compact('data','type'));
    }

    public function food_category($id)
    {
        if ($id == 0) {
            $lat = Session::get('lat');

            $lon = Session::get('lng');

            $dat = Food::all();

            $data = [];

            foreach ($dat as $key => $value) {
                # code...
                $distance = GeoFacade::setPoint([$lat, $lon])
                    ->setOptions(['units' => ['km']])
                    // you can set unlimited lat/long points.
                    ->setPoint([$value->vendor->vendor->address_latitude, $value->vendor->vendor->address_longitude])
                    // get the calculated distance between each point
                    ->getDistance();

                if ($distance['1-2']['km'] <= 10) {
                    # code...
                    array_push($data,$value);
                }

            }

        }else{
            $lat = Session::get('lat');

            $lon = Session::get('lng');

            $dat = Food::where('category_id',$id)->get();

            $data = [];

            foreach ($dat as $key => $value) {
                # code...
                $distance = GeoFacade::setPoint([$lat, $lon])
                    ->setOptions(['units' => ['km']])
                    // you can set unlimited lat/long points.
                    ->setPoint([$value->vendor->vendor->address_latitude, $value->vendor->vendor->address_longitude])
                    // get the calculated distance between each point
                    ->getDistance();

                if ($distance['1-2']['km'] <= 10) {
                    # code...
                    array_push($data,$value);
                }

            }

        }

        $type = 'food';

        return view('user.category',compact('data','type'));
    }

    public function review(Request $request)
    {
        // dd($request->all());

        if( isset($request->rating)) {
            # code...
            $rating = $request->rating;
        } else {
            # code...
            $rating = 0;
        }

        if ($request->type == 'product') {
            # code...
            $product = Product::find($request->product_id);

            $user_id = $product->user_id;

        } elseif($request->type == 'service') {
            # code...
            $product = Service::find($request->product_id);

            $user_id = $product->user_id;

        } elseif($request->type == 'food') {
            # code...
            $product = Food::find($request->product_id);

            $user_id = $product->user_id;

        } elseif($request->type == 'event') {
            # code...
            $product = Event::find($request->product_id);

            $user_id = $product->user_id;

        } elseif($request->type == 'campaign') {
            # code...
            $product = Campaign::find($request->product_id);

            $user_id = $product->user_id;

        }

        $sender_id = Auth::user()->id;

        $add = new Review;
        $add->product_id = $request->product_id;
        $add->message = $request->message;
        $add->rating = $rating;
        $add->type = $request->type;
        $add->user_id = $user_id;
        $add->sender_id = $sender_id;
        $add->save();

        $visit =  new Visit;
        $visit->user_id = $user_id;
        $visit->visitor_id = Auth::user()->id;
        $visit->page = $request->type;
        $visit->type = 'review';
        $visit->link = '/vendor/'.$request->type.'/review/'.$request->product_id;
        $visit->save();

        return redirect('/user'.'/'.$request->type.'/'.$request->type.'/'.$request->product_id)->with('success','Your Review has been submited successfully !');;


    }

    public function start_up()
    {
        $data = StartUpCategory::all();

        return view('user.start_up',compact('data'));
    }

    public function start_up_submit(Request $request)
    {
        $add = new StartUp;
        $add->user_id = Auth::user()->id;
        $add->name = $request->name;
        $add->email = $request->email;
        $add->phone = $request->phone;
        $add->indrusty_id = $request->indrusty_id;
        $add->description = $request->description;
        $add->save();

        return back()->with('success','Your StartUp Idea has been submited successfully! You will be notified if your idea is selected.');
    }

    public function help()
    {
        return view('user.help&faq');
    }

    public function wish()
    {
        $data = WishList::where('user_id',Auth::user()->id)->latest()->get();

        return view('user.wish',compact('data'));
    }

    public function campaign_wish($id)
    {
        $add = new WishList;
        $add->user_id = Auth::user()->id;
        $add->product_id = $id;
        $add->type = 'campaign';
        $add->save();

        return back()->with('success','Successfully added to Wish-List !');
    }

    public function service_wish($id)
    {
        $add = new WishList;
        $add->user_id = Auth::user()->id;
        $add->product_id = $id;
        $add->type = 'service';
        $add->save();

        return back()->with('success','Successfully added to Wish-List !');
    }

    public function product_wish($id)
    {
        $add = new WishList;
        $add->user_id = Auth::user()->id;
        $add->product_id = $id;
        $add->type = 'product';
        $add->save();

        return back()->with('success','Successfully added to Wish-List !');
    }

    public function food_wish($id)
    {
        $add = new WishList;
        $add->user_id = Auth::user()->id;
        $add->product_id = $id;
        $add->type = 'food';
        $add->save();

        return back()->with('success','Successfully added to Wish-List !');
    }

    public function event_wish($id)
    {
        $add = new WishList;
        $add->user_id = Auth::user()->id;
        $add->product_id = $id;
        $add->type = 'event';
        $add->save();

        return back()->with('success','Successfully added to Wish-List !');
    }

    public function about()
    {
        return view('user.about');
    }

    public function terms()
    {
        return view('user.terms');
    }

    public function campaign()
    {
        // $data = Campaign::all();

        // $data = NPOCategory::all();

        $data = VendorDetail::where('business_type','non-profit')->where('country_id',Auth::user()->country_id)->get();

        return view('user.campaign.index',compact('data'));
    }

    public function campaign_show($id)
    {
        $data = Campaign::find($id);

        $visit =  new Visit;
        $visit->user_id = $data->user_id;
        $visit->visitor_id = Auth::user()->id;
        $visit->page = 'campaign';
        $visit->type = 'visit';
        $visit->save();

        return view('user.campaign.show',compact('data'));
    }

    public function campaign_profile($id)
    {

        $user = VendorDetail::find($id);



        $campaign = Campaign::where('user_id',$user->user_id)->limit(2)->get();

        // $data = User::where('id',$data->user_id)->first();

        // $campaign = Campaign::where('user_id',$data->id)->limit(2)->get();

        $event = Event::where('user_id',$user->user_id)->limit(2)->get();

        $visit =  new Visit;
        $visit->user_id = $user->user_id;
        $visit->visitor_id = Auth::user()->id;
        $visit->page = 'profile';
        $visit->type = 'visit';
        $visit->save();

        $data = User::find($user->user_id);

        return view('user.campaign.profile',compact('data','campaign','event'));
    }

    public function campaign_all($id)
    {
        // dd($id);
        $data = Campaign::where('user_id',$id)->latest()->get();

        return view('user.campaign.all',compact('data'));
    }

    public function campaign_review($id)
    {
        $data = Campaign::find($id);

        $type = 'campaign';

        $review = Review::where('product_id',$id)->where('type','campaign')->get();

        return view('user.review',compact('data','type','review'));
    }

    public function event()
    {
        $data = Event::all();

        return view('user.event.index',compact('data'));
    }

    public function event_show($id)
    {
        $data = Event::find($id);

        $visit =  new Visit;
        $visit->user_id = $data->user_id;
        $visit->visitor_id = Auth::user()->id;
        $visit->page = 'event';
        $visit->type = 'visit';
        $visit->save();

        return view('user.event.show',compact('data'));
    }

    public function event_profile($id)
    {
        $data = Event::find($id);

        $data = User::where('id',$data->user_id)->first();

        $campaign = Campaign::where('user_id',$data->id)->limit(2)->get();

        $event = Event::where('user_id',$data->id)->limit(2)->get();

        $visit =  new Visit;
        $visit->user_id = $data->id;
        $visit->visitor_id = Auth::user()->id;
        $visit->page = 'profile';
        $visit->type = 'visit';
        $visit->save();

        return view('user.event.profile',compact('data','campaign','event'));
    }

    public function event_all($id)
    {
        $data = Event::where('user_id',$id)->latest()->get();

        return view('user.event.index',compact('data'));
    }

    public function event_review($id)
    {
        $data = Event::find($id);

        $type = 'event';

        $review = Review::where('product_id',$id)->where('type','event')->get();

        return view('user.review',compact('data','type','review'));
    }

    public function product()
    {
        $data = ProductCategory::all();

        return view('user.product.index',compact('data'));
    }

    public function product_show($id)
    {
        $data = Product::find($id);

        $visit =  new Visit;
        $visit->user_id = $data->user_id;
        $visit->visitor_id = Auth::user()->id;
        $visit->page = 'product';
        $visit->type = 'visit';
        $visit->save();

        return view('user.product.show',compact('data'));
    }

    public function product_profile($id)
    {
        $data = Product::find($id);

        $data = User::where('id',$data->user_id)->first();

        $campaign = Campaign::where('user_id',$data->id)->limit(2)->get();

        $event = Event::where('user_id',$data->id)->limit(2)->get();

        $visit =  new Visit;
        $visit->user_id = $data->id;
        $visit->visitor_id = Auth::user()->id;
        $visit->page = 'profile';
        $visit->type = 'visit';
        $visit->save();

        return view('user.product.profile',compact('data','campaign','event'));
    }

    public function product_all($id)
    {
        $data = Product::where('user_id',$id)->latest()->get();

        return view('user.product.index',compact('data'));
    }

    public function product_review($id)
    {
        $data = Product::find($id);

        $review = Review::where('product_id',$id)->where('type','product')->get();

        $type = 'product';

        return view('user.review',compact('data','type','review'));
    }

    public function service()
    {
        $data = ServiceCategory::all();

        return view('user.service.index',compact('data'));
    }

    public function service_show($id)
    {
        $data = Service::find($id);

        $visit =  new Visit;
        $visit->user_id = $data->user_id;
        $visit->visitor_id = Auth::user()->id;
        $visit->page = 'service';
        $visit->type = 'visit';
        $visit->save();

        return view('user.service.show',compact('data'));
    }

    public function service_profile($id)
    {
        $data = Service::find($id);

        $data = User::where('id',$data->user_id)->first();

        $campaign = Product::where('user_id',$data->id)->limit(2)->get();

        $event = Service::where('user_id',$data->id)->limit(2)->get();

        $visit =  new Visit;
        $visit->user_id = $data->id;
        $visit->visitor_id = Auth::user()->id;
        $visit->page = 'profile';
        $visit->type = 'visit';
        $visit->save();

        return view('user.service.profile',compact('data','campaign','event'));
    }

    public function service_all($id)
    {
        $data = Service::where('user_id',$id)->latest()->get();

        return view('user.service.index',compact('data'));
    }

    public function service_review($id)
    {
        $data = Service::find($id);

        $type = 'service';

        $review = Review::where('product_id',$id)->where('type','service')->get();

        return view('user.review',compact('data','type','review'));
    }

    public function food()
    {
        $data = FoodMenuCategory::all();

        return view('user.food.index',compact('data'));
    }

    public function food_show($id)
    {
        $data = Food::find($id);

        $visit =  new Visit;
        $visit->user_id = $data->user_id;
        $visit->visitor_id = Auth::user()->id;
        $visit->page = 'food';
        $visit->type = 'visit';
        $visit->save();

        return view('user.food.show',compact('data'));
    }

    public function food_profile($id)
    {
        $data = Food::find($id);

        $data = User::where('id',$data->user_id)->first();

        $campaign = Event::where('user_id',$data->id)->limit(2)->get();

        $event = Food::where('user_id',$data->id)->limit(2)->get();

        $visit =  new Visit;
        $visit->user_id = $data->id;
        $visit->visitor_id = Auth::user()->id;
        $visit->page = 'profile';
        $visit->type = 'visit';
        $visit->save();

        return view('user.food.profile',compact('data','campaign','event'));
    }

    public function food_all($id)
    {
        $data = Food::where('user_id',$id)->latest()->get();

        return view('user.food.index',compact('data'));
    }

    public function food_review($id)
    {
        $data = Food::find($id);

        $type = 'food';

        $review = Review::where('product_id',$id)->where('type','food')->get();

        return view('user.review',compact('data','type','review'));
    }
}
