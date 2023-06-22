@extends('vendor_panel.layouts.main')

@section('title')
    Ratings & Reviews
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card mt-4" style="border-radius: 15px; background: #EFEFEF;">
                <div class="rating m-auto" style="display: inline-block; margin-top: 2rem !important; margin-bottom: 2rem !important;">
                    <span class="font-weight-bold text-dark mr-2" style="font-size: 16px;">4</span> 
                    <span style="color: orange; font-size: 17px;" class="mdi mdi-star"></span>
                    <span style="color: orange; font-size: 17px;" class="mdi mdi-star"></span>
                    <span style="color: orange; font-size: 17px;" class="mdi mdi-star"></span>
                    <span style="color: orange; font-size: 17px;" class="mdi mdi-star"></span>
                    <span style="color: orange; font-size: 17px;" class="mdi mdi-star"></span>
                </div>
                <span class="m-auto" style="font-size: 18px; font-weight: 500; color: #000; margin-bottom: 2rem !important;">Based on 10 Ratings & Reviews</span>
            </div>
            <div class="card mt-4" style="border-radius: 20px; box-shadow: -4px 4px 4px 0px rgba(0,0,0,0.1);">
                <div class="rating ml-4" style="display: inline-block; margin-top: 2rem !important; margin-bottom: 1rem !important;">
                    <span class="font-weight-bold text-dark mr-2" style="font-size: 16px;">4</span> 
                    <span style="color: orange; font-size: 17px;" class="mdi mdi-star"></span>
                    <span style="color: orange; font-size: 17px;" class="mdi mdi-star"></span>
                    <span style="color: orange; font-size: 17px;" class="mdi mdi-star"></span>
                    <span style="color: orange; font-size: 17px;" class="mdi mdi-star"></span>
                    <span style="color: orange; font-size: 17px;" class="mdi mdi-star"></span>
                </div>
                <span class="ml-4" style="font-size: 13px; font-weight: 500; color: #000; margin-bottom: 1rem !important;">Great Services, specially after sells.</span>

                <div class="reviewer mb-4">
                    <span class="ml-4" style="font-size: 13px; color: #000; margin-bottom: 1rem !important;">Timothy Greene <span style="display: inline-block; height: 7px; width: 7px; background: #000; border-radius: 50%; margin-left: 1rem;"></span> 3 weeks ago</span>
                </div>


            </div>
        </div>
    </div>
@endsection