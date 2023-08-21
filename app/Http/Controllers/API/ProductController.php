<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;

class ProductController extends Controller
{
    public function all(Request $request)
    {
        $data['data'] = Product::all()->toArray();

        return $data;
    }

    public function all_category(Request $request)
    {
        $data['data'] = ProductCategory::all()->toArray();

        return $data;
    }

    public function all_sub_category(Request $request)
    {
        $data['data'] = ProductSubCategory::where('category_id',$request->category_id)->latest()->get();

        return $data;
    }

    public function by_category(Request $request)
    {
        $data['data'] = Product::where('category_id',$request->category_id)->latest()->get();

        return $data;
    }

    public function by_sub_category(Request $request)
    {
        $data['data'] = Product::where('sub_category_id',$request->sub_category_id)->latest()->get();

        return $data;
    }

    public function by_vendor(Request $request)
    {
        $data['data'] = Product::where('user_id',$request->user_id)->latest()->get();

        return $data;
    }

    public function detail(Request $request)
    {
        $data['data'] = Product::where('id',$request->id)->with('vendor.vendor')->with('category')->with('sub_category')->first();

        return $data;
    }

    public function review(Request $request)
    {
        $data['data'] = Review::where('type','product')->where('product_id',$request->id)->with('sender')->get();

        return $data;
    }
}
