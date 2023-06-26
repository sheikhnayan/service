<?php

namespace App\Http\Controllers\vendor_panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceSubCategory;
use App\Models\Review;
use Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Service::where('user_id',Auth::user()->id)->get();

        return view('vendor_panel.service.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor_panel.service.create');
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

        $image = $request->image->storeAs('public/service', $imageName);

        $image = str_replace('public','',$image);

        $add = new Service;
        $add->user_id = $user_id;
        $add->name = $request->name;
        $add->image = $image;
        $add->description = $request->description;
        $add->category_id = $request->category_id;
        $add->sub_category_id = $request->sub_category_id;
        $add->price = $request->price;
        $add->link = $request->link;
        $add->contact_number = $request->contact_number;
        $add->save();

        return redirect(route('vendor.service.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Service::find($id);

        return view('vendor_panel.service.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Service::find($id);

        return view('vendor_panel.service.edit',compact('data'));
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
    
            $image = $request->image->storeAs('public/service', $imageName);

            $image = str_replace('public','',$image);
        }


        $add = Service::find($id);
        $add->name = $request->name;

        if (isset($request->image)) {
        $add->image = $image;
        }

        $add->description = $request->description;
        $add->category_id = $request->category_id;
        $add->sub_category_id = $request->sub_category_id;
        $add->price = $request->price;
        $add->link = $request->link;
        $add->contact_number = $request->contact_number;
        $add->update();

        return redirect( route('vendor.service.index') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_service_sub_category($id)
    {
        return $data = ServiceSubCategory::where('service_category_id',$id)->get();
    }

    /**
     * Show the specified resource's Reviews.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function review($id)
    {
        $data = Review::where('type','service')->where('product_id',$id)->get();

        return view('vendor_panel.product.review',compact('data'));
    }
}
