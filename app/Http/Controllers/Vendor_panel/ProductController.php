<?php

namespace App\Http\Controllers\vendor_panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSubCategory;
use App\Models\Review;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;

        $data = Product::where('user_id',$user)->latest()->get();

        return view('vendor_panel.product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor_panel.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Auth::user()->id;

        $imageName = time().'.'.$request->image->extension();   

        $image = $request->image->storeAs('public/product', $imageName);

        $image = str_replace('public','',$image);

        $add = new Product;
        $add->user_id = $user;
        $add->name = $request->name;
        $add->image = $image;
        $add->description = $request->description;
        $add->category_id = $request->category_id;
        $add->sub_category_id = $request->sub_category_id;
        $add->status = $request->status;
        $add->price = $request->price;
        $add->model = $request->model;
        $add->color = $request->color;
        $add->link = $request->link;
        $add->save();

        return redirect( route('vendor.product.index') );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::find($id);

        return view('vendor_panel.product.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::find($id);

        return view('vendor_panel.product.edit',compact('data'));
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
    
            $image = $request->image->storeAs('public/product', $imageName);

            $image = str_replace('public','',$image);
        }


        $add = Product::find($id);
        $add->name = $request->name;

        if (isset($request->image)) {
        $add->image = $image;
        }

        $add->description = $request->description;
        $add->category_id = $request->category_id;
        $add->sub_category_id = $request->sub_category_id;
        $add->status = $request->status;
        $add->price = $request->price;
        $add->model = $request->model;
        $add->color = $request->color;
        $add->link = $request->link;
        $add->update();

        return redirect( route('vendor.product.index') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_product_sub_category($id)
    {
        return $data = ProductSubCategory::where('product_category_id',$id)->get();
    }

    /**
     * Show the specified resource's Reviews.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function review($id)
    {
        $data = Review::where('type','product')->where('product_id',$id)->get();

        return view('vendor_panel.product.review',compact('data'));
    }
}
