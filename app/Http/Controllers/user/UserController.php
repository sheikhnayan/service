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
use Auth;

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
            $data = Product::all();
        }else{
            $data = Product::where('category_id',$id)->get();
        }

        $type = 'product';

        return view('user.category',compact('data','type'));
    }

    public function campaign_category($id)
    {
        // $data = [];

        $data = VendorDetail::where('npo_category_id',$id)->get();

        
        // foreach ($vendors as $value) {
        //     # code...
        //     $campaigns = Campaign::where('user_id',$value->user_id)->get();

        //     foreach ($campaigns as $campaign) {
        //         # code...

        //         array_push($data,$campaign);

        //     }

        // }


        $type = 'campaign';

        return view('user.campaign.category',compact('data','type'));
    }

    public function service_category($id)
    {
        if ($id == 0) {
            $data = Service::all();
        }else{
            $data = Service::where('category_id',$id)->get();
        }

        $type = 'service';

        return view('user.category',compact('data','type'));
    }

    public function food_category($id)
    {
        if ($id == 0) {
            $data = Food::all();
        }else{
            $data = Food::where('category_id',$id)->get();
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

        $data = NPOCategory::all();

        return view('user.campaign.index',compact('data'));
    }

    public function campaign_show($id)
    {
        $data = Campaign::find($id);

        $visit =  new Visit;
        $visit->user_id = $data->user_id;
        $visit->visitor_id = Auth::user()->id;
        $visit->page = 'campaign';
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

        return view('user.review',compact('data','type'));
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

        return view('user.review',compact('data','type'));
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

        $type = 'product';

        return view('user.review',compact('data','type'));
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

        return view('user.review',compact('data','type'));
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

        return view('user.review',compact('data','type'));
    }
}
