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

    public function campaign()
    {
        $data = Campaign::all();

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
        $data = Campaign::find($id);

        $data = User::where('id',$data->user_id)->first();

        $campaign = Campaign::where('user_id',$data->id)->limit(2)->get();

        $event = Event::where('user_id',$data->id)->limit(2)->get();

        $visit =  new Visit;
        $visit->user_id = $data->id;
        $visit->visitor_id = Auth::user()->id;
        $visit->page = 'profile';
        $visit->save();

        return view('user.campaign.profile',compact('data','campaign','event'));
    }

    public function campaign_all($id)
    {
        $data = Campaign::where('user_id',$id)->latest()->get();

        return view('user.campaign.index',compact('data'));
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
        $data = Campaign::find($id);

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

    public function product()
    {
        $data = Product::all();

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
        $data = Campaign::find($id);

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

    public function service()
    {
        $data = Service::all();

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
        $data = Campaign::find($id);

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

    public function food()
    {
        $data = Food::all();

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
        $data = Campaign::find($id);

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
}
