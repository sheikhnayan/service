<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NPOCategory;
use App\Models\VendorDetail;

class NPOCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.meta-data.npo-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request->image)) {
            # code...
            $imageName = time().'.'.$request->image->extension();   
    
            $image = $request->image->storeAs('public/food', $imageName);

            $image = str_replace('public','',$image);
        }

        $add = new NPOCategory;
        $add->name = $request->name;
        $add->image = $image;
        $add->save();

        return redirect(route('admin.meta-data.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = NPOCategory::find($id);

        return view('admin.meta-data.npo-category.edit',compact('data'));
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

        if (isset($request->image)) {
            # code...
            $imageName = time().'.'.$request->image->extension();   
    
            $image = $request->image->storeAs('public/food', $imageName);

            $image = str_replace('public','',$image);
        }

        $update = NPOCategory::find($id);
        $update->name = $request->name;
        if (isset($request->image)) {
            $update->image = $image;
        }
        $update->update();

        return redirect(route('admin.meta-data.index'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = VendorDetail::where('npo_category_id',$id)->count();
        
        if ($check > 0) {
            # code...
            return redirect(route('admin.meta-data.index'))->with('failure','This Category is Used in NPO List !');

        }else{
            $delete = NPOCategory::where('id',$id)->delete();
        }


        return redirect(route('admin.meta-data.index'))->with('success','This Category Deleted Successfully !');
    }
}
