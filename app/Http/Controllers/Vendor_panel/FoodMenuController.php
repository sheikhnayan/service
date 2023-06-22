<?php

namespace App\Http\Controllers\vendor_panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\FoodMenuCategory;
use Auth;

class FoodMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Food::where('user_id',Auth::user()->id)->get();

        return view('vendor_panel.food-menu.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor_panel.food-menu.create');
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

        $image = $request->image->storeAs('public/food', $imageName);

        $image = str_replace('public','',$image);

        $add = new Food;
        $add->user_id = $user_id;
        $add->name = $request->name;
        $add->image = $image;
        $add->description = $request->description;
        $add->category_id = $request->category_id;
        $add->price = $request->price;
        $add->link = $request->link;
        $add->save();

        return redirect(route('vendor.food-menu.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Food::find($id);

        return view('vendor_panel.food-menu.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Food::find($id);

        return view('vendor_panel.food-menu.edit',compact('data'));
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


        $add = Food::find($id);
        $add->name = $request->name;

        if (isset($request->image)) {
        $add->image = $image;
        }

        $add->description = $request->description;
        $add->category_id = $request->category_id;
        $add->price = $request->price;
        $add->link = $request->link;
        $add->update();

        return redirect( route('vendor.food-menu.index') );
    }


    /**
     * Show the specified resource's Reviews.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function review()
    {
        return view('vendor_panel.food-menu.review');
    }
}
