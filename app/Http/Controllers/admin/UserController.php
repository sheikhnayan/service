<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('type','!=','admin')->latest()->get();

        return view('admin.user.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function standard()
    {
        $data = User::where('type','!=','admin')->latest()->get();

        return view('admin.user.standard',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function preferred()
    {
        $data = User::where('type','!=','admin')->latest()->get();

        return view('admin.user.preferred',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function premium()
    {
        $data = User::where('type','!=','admin')->latest()->get();

        return view('admin.user.premium',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);

        return view('admin.user.edit',compact('data'));
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        if ($request->password != null) {
            # code...
            $password = Hash::make($request->password);
            $user->password = $password;
        }
        $user->update();

        $vendor = $user->vendor;
        $vendor->company_name = $request->company_name;
        $vendor->country_id = $request->country_id;
        $vendor->state_id = $request->state_id;
        $vendor->address = $request->address;

        if (isset($request->image)) {
            # code...
            $imageName = time().'.'.$request->image->extension();   
    
            $image = $request->image->storeAs('public/product', $imageName);

            $image = str_replace('public','',$image);

            $vendor->logo = $image;

        }

        $vendor->update();
        
        return redirect(route('admin.user.edit',[$id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id',$id)->delete();

        return redirect(route('admin.user.index'));
    }
}
