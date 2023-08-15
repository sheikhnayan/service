<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function all(Request $request)
    {
        $data['data'] = Event::all()->toArray();

        return $data;
    }

    public function by_vendor(Request $request)
    {
        $data['data'] = Event::where('user_id',$request->user_id)->latest()->get();

        return $data;
    }

    public function detail(Request $request)
    {
        $data['data'] = Event::where('id',$request->id)->with('vendor.vendor')->first();

        return $data;
    }

}
