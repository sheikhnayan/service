<?php

namespace App\Http\Controllers\vendor_panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Event::where('user_id',Auth::user()->id)->get();

        return view('vendor_panel.event.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor_panel.event.create');
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

        $image = $request->image->storeAs('public/event', $imageName);

        $image = str_replace('public','',$image);

        $add = new Event;
        $add->user_id = $user_id;
        $add->name = $request->name;
        $add->image = $image;
        $add->description = $request->description;
        $add->type = $request->type;
        $add->date = $request->date;
        $add->link = $request->link;
        $add->location = $request->location;
        $add->save();

        return redirect(route('vendor.event.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Event::find($id);

        return view('vendor_panel.event.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Event::find($id);

        return view('vendor_panel.event.edit',compact('data'));
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
    
            $image = $request->image->storeAs('public/event', $imageName);

            $image = str_replace('public','',$image);
        }


        $add = Event::find($id);
        $add->name = $request->name;

        if (isset($request->image)) {
        $add->image = $image;
        }

        $add->description = $request->description;
        $add->type = $request->type;
        $add->date = $request->date;
        $add->link = $request->link;
        $add->location = $request->location;
        $add->update();

        return redirect( route('vendor.event.index') );
    }


    /**
     * Show the specified resource's Reviews.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function review()
    {
        return view('vendor_panel.event.review');
    }
}
