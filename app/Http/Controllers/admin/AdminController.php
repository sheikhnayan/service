<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\Support;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;
use App\Models\FoodMenuCategory;
use App\Models\NPOCategory;
use App\Models\StartUpCategory;
use App\Models\StartUp;
use App\Models\User;
use File;
use ZipArchive;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function meta_data()
    {
        $countries = Country::all();
        $states = State::all();
        $product_category = ProductCategory::all();
        $product_sub_category = ProductSubCategory::all();
        $service_category = ServiceCategory::all();
        $service_sub_category = ServiceSubCategory::all();
        $food_menu_category = FoodMenuCategory::all();
        $npo_category = NPOCategory::all();
        $start_up_category = StartUpCategory::all();

        return view('admin.meta-data.index',compact('start_up_category','npo_category','countries','states','product_category','product_sub_category','service_category','service_sub_category','food_menu_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function support()
    {
        $data = Support::latest()->get();
        
        return view('admin.support',compact('data'));
    }

    public function start_up()
    {
        $data = StartUp::latest()->get();
        
        return view('admin.start-up',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function zip($id)
    {
        $zip = new ZipArchive;

        $vendor = User::find($id);

        $fileName = $vendor->vendor->company_name.'.zip';

        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
        {
            $files = File::files(public_path('storage/vendor'));

            foreach ($files as $key => $value) {

                if (Str::contains($vendor->vendor->document, $value)) {
                    # code...
                    $relativeNameInZipFile = basename($value);
    
                    $zip->addFile($value, $relativeNameInZipFile);
                }

            }

            $zip->close();
        }
        return response()->download(public_path($fileName));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
