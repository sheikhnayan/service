<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VendorDetail;
use App\Models\Event;
use App\Models\Service;
use App\Models\Campaign;
use App\Models\Product;
use App\Models\Food;
use App\Models\Support;
use App\Models\Review;
use Carbon\Carbon;
use App\Mail\Approve;
use Mail;
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
        $data = User::where('type','user')->latest()->get();

        return view('admin.user.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function standard()
    {
        $data = User::where('type','vendor')->latest()->get();

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
        $data = User::where('type','vendor')->latest()->get();

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
        $data = User::where('type','vendor')->latest()->get();

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
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->password != null) {
            # code...
            $password = Hash::make($request->password);
            $user->password = $password;
        }
        $user->update();

        if ($user->type == 'vendor') {
            // dd($request->status);
            # code...
            $vendor = $user->vendor;
            $vendor->company_name = $request->company_name;
            $vendor->country_id = $request->country_id;
            $vendor->state_id = $request->state_id;
            $vendor->address = $request->address;
            $vendor->status = $request->status;
            $vendor->npo_category_id = $request->npo_category_id;

            if (isset($request->image)) {
                # code...
                $imageName = time().'.'.$request->image->extension();

                $image = $request->image->storeAs('public/product', $imageName);

                $image = str_replace('public','',$image);

                $vendor->logo = $image;

            }

            $vendor->update();


            $content = [
                'subject' => 'Your Account is Approved! - Welcome to Transcending Black Excellence.',
                'body' => "Dear ".$request->name.", <br> <br>

                We're thrilled to inform you that your account with Transcending Black Excellence has been approved! Welcome to our platform. <br> <br>

                **Account Details:** <br>
                - Username: ".$request->name." <br>
                - Email: ".$request->email." <br>
                - Date of Registration: ".Carbon::now()." <br> <br>

                You can now <a href='https://app.tbe-web.com/vendor-login'>log in to your account</a> using your phone number & password! <br><br>


                Feel free to explore the features and services we offer. If you have any questions or need assistance, don't hesitate to contact our dedicated support team at <a href='mailto:Support@tbe-web.com'>Support@tbe-web.com</a>. We're here to assist you every step of the way. <br> <br>

                Thank you for choosing Transcending Black Excellence. We're excited to embark on this journey with you! <br> <br>

                Warm regards, <br> <br>
                Team Transcending Black Excellence

                "
            ];

            $test = Mail::to($request->email)->send(new Approve($content));

            dd($request->email);
        }

        return redirect(route('admin.user.edit',[$id]))->with('success','Profile Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendor = VendorDetail::where('user_id',$id)->delete();

        $event = Event::where('user_id',$id)->delete();
        $service = Service::where('user_id',$id)->delete();
        $campaign = Campaign::where('user_id',$id)->delete();
        $product = Product::where('user_id',$id)->delete();
        $food = Food::where('user_id',$id)->delete();
        $support = Support::where('user_id',$id)->delete();
        $review = Review::where('user_id',$id)->delete();

        $user = User::where('id',$id)->delete();


        return back()->with('success','User Deleted Successfully!');
    }
}
