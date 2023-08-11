<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceCategory;

class ServiceController extends Controller
{
    public function all(Request $request)
    {
        $data = Service::all();

        return $data;
    }

    public function by_category(Request $request)
    {
        $data = Service::where('category_id',$request->category_id)->latest()->get();

        return $data;
    }

    public function by_sub_category(Request $request)
    {
        $data = Service::where('sub_category_id',$request->sub_category_id)->latest()->get();

        return $data;
    }

    public function detail(Request $request)
    {
        $data = Service::where('id',$request->id)->with('vendor.vendor')->first();

        return $data;
    }
}
