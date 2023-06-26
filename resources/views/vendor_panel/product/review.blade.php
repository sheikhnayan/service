@extends('vendor_panel.layouts.main')

@section('title')
    Ratings & Reviews
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card mt-4" style="border-radius: 15px; background: #EFEFEF;">
                <div class="rating m-auto" style="display: inline-block; margin-top: 2rem !important; margin-bottom: 2rem !important;">
                    @php
                        $avg = $data->avg('rating');
                    @endphp
                    <span class="font-weight-bold text-dark mr-2" style="font-size: 16px;">{{ $avg }}</span> 
                    <span style="font-size: 17px;" class="mdi mdi-star {{ $avg > 0 ? 'orange': ''}}"></span>
                    <span style="font-size: 17px;" class="mdi mdi-star {{ $avg > 1 ? 'orange': ''}}"></span>
                    <span style="font-size: 17px;" class="mdi mdi-star {{ $avg > 2 ? 'orange': ''}}"></span>
                    <span style="font-size: 17px;" class="mdi mdi-star {{ $avg > 3 ? 'orange': ''}}"></span>
                    <span style="font-size: 17px;" class="mdi mdi-star {{ $avg > 4 ? 'orange': ''}}"></span>
                </div>
                <span class="m-auto" style="font-size: 18px; font-weight: 500; color: #000; margin-bottom: 2rem !important;">Based on {{ $data->count() }} Ratings & Reviews</span>
            </div>
            @foreach ($data as $item)
                
            <div class="card mt-4" style="border-radius: 20px; box-shadow: -4px 4px 4px 0px rgba(0,0,0,0.1);">
                <div class="rating ml-4" style="display: inline-block; margin-top: 2rem !important; margin-bottom: 1rem !important;">
                    <span class="font-weight-bold text-dark mr-2" style="font-size: 16px;">{{ $item->rating }}</span> 
                    <span style="font-size: 17px;" class="mdi mdi-star {{ $item->rating > 0 ? 'orange': ''}}"></span>
                    <span style="font-size: 17px;" class="mdi mdi-star {{ $item->rating > 1 ? 'orange': ''}}"></span>
                    <span style="font-size: 17px;" class="mdi mdi-star {{ $item->rating > 2 ? 'orange': ''}}"></span>
                    <span style="font-size: 17px;" class="mdi mdi-star {{ $item->rating > 3 ? 'orange': ''}}"></span>
                    <span style="font-size: 17px;" class="mdi mdi-star {{ $item->rating > 4 ? 'orange': ''}}"></span>
                </div>
                <span class="ml-4" style="font-size: 13px; font-weight: 500; color: #000; margin-bottom: 1rem !important;">{{ $item->message }}</span>

                <div class="reviewer mb-4">
                    <span class="ml-4" style="font-size: 13px; color: #000; margin-bottom: 1rem !important;">{{ $item->sender->name }} <span style="display: inline-block; height: 7px; width: 7px; background: #000; border-radius: 50%; margin-left: 1rem;"></span> {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</span>
                </div>


            </div>

            @endforeach
        </div>
    </div>
@endsection