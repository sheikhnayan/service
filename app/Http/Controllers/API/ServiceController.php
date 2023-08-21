<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Review;
use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;

class ServiceController extends Controller
{
    public function all(Request $request)
    {
        $data['data'] = Service::all()->toArray();

        return $data;
    }

    public function all_category(Request $request)
    {
        $data['data'] = ServiceCategory::all()->toArray();

        return $data;
    }

    public function all_sub_category(Request $request)
    {
        $data['data'] = ServiceSubCategory::where('service_category_id',$request->category_id)->latest()->get();

        return $data;
    }

    public function by_category(Request $request)
    {
        $data['data'] = Service::where('category_id',$request->category_id)->latest()->get();

        return $data;
    }

    public function by_sub_category(Request $request)
    {
        $data['data'] = Service::where('sub_category_id',$request->sub_category_id)->latest()->get();

        return $data;
    }

    public function by_vendor(Request $request)
    {
        $data['data'] = Service::where('user_id',$request->user_id)->latest()->get();

        return $data;
    }

    public function detail(Request $request)
    {
        $data['data'] = Service::where('id',$request->id)->with('vendor.vendor')->with('category')->with('sub_category')->first();

        return $data;
    }

    public function review(Request $request)
    {
        $data['data'] = Review::where('type','service')->where('product_id',$request->id)->with('sender')->get();

        return $data;
    }
}
