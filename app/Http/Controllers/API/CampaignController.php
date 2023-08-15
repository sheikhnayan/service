<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;

class CampaignController extends Controller
{
    public function all(Request $request)
    {
        $data['data'] = Campaign::all()->toArray();

        return $data;
    }

    public function by_vendor(Request $request)
    {
        $data['data'] = Campaign::where('user_id',$request->user_id)->latest()->get();

        return $data;
    }

    public function detail(Request $request)
    {
        $data['data'] = Campaign::where('id',$request->id)->with('vendor.vendor')->first();

        return $data;
    }

}
