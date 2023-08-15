<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Review;
use App\Models\FoodCategory;

class FoodController extends Controller
{
    public function all(Request $request)
    {
        $data['data'] = Food::all()->toArray();

        return $data;
    }

    public function by_category(Request $request)
    {
        $data['data'] = Food::where('category_id',$request->category_id)->latest()->get();

        return $data;
    }

    public function by_vendor(Request $request)
    {
        $data['data'] = Food::where('user_id',$request->user_id)->latest()->get();

        return $data;
    }

    public function detail(Request $request)
    {
        $data['data'] = Food::where('id',$request->id)->with('vendor.vendor')->with('category')->first();

        return $data;
    }

    public function review(Request $request)
    {
        $data['data'] = Review::where('type','food')->where('product_id',$request->id)->with('sender')->get();

        return $data;
    }
}
