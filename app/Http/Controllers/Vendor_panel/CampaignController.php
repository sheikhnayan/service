<?php

namespace App\Http\Controllers\vendor_panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Review;
use Auth;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Campaign::where('user_id',Auth::user()->id)->get();

        return view('vendor_panel.campaign.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor_panel.campaign.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id; 

        $imageName = time().'.'.$request->image->extension();   

        $image = $request->image->storeAs('public/campaign', $imageName);

        $image = str_replace('public','',$image);

        $add = new Campaign;
        $add->user_id = $user_id;
        $add->name = $request->name;
        $add->image = $image;
        $add->description = $request->description;
        $add->link = $request->link;
        $add->location = $request->location;
        $add->contact_number = $request->contact_number;
        $add->save();

        return redirect(route('vendor.campaign.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Campaign::find($id);

        return view('vendor_panel.campaign.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Campaign::find($id);

        return view('vendor_panel.campaign.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user()->id;

        if (isset($request->image)) {
            # code...
            $imageName = time().'.'.$request->image->extension();   
    
            $image = $request->image->storeAs('public/campaign', $imageName);

            $image = str_replace('public','',$image);
        }


        $add = Campaign::find($id);
        $add->name = $request->name;

        if (isset($request->image)) {
        $add->image = $image;
        }

        $add->description = $request->description;
        $add->link = $request->link;
        $add->location = $request->location;
        $add->contact_number = $request->contact_number;
        $add->update();

        return redirect( route('vendor.campaign.index') );
    }


    /**
     * Show the specified resource's Reviews.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function review($id)
    {
        $data = Review::where('type','campaign')->where('product_id',$id)->get();

        return view('vendor_panel.product.review',compact('data'));
    }
}
