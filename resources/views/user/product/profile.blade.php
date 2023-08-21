 
@extends('vendor_panel.layouts.main')

@section('title')
    Product
@endsection

@section('content')

<div class="content-wrapper">
    <div class="content">
      <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card" style="border-radius: 8px; background: #f8f9ff">
            <img class="img-fluid" src="{{ asset('storage/'.$data->vendor->logo) }}" alt="" width="92px" height="92px" style=" margin-left: 2rem; margin-top: 2rem;
            ">

            {{-- <p style="text-align: center; padding: 3rem; color:black">Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. </p> --}}

            <h4 style="padding: 2rem 2rem; color:black; text-align: left;">{{ $data->vendor->company_name }}</h4>

            <p style="padding: 0rem 2rem; color:#000; text-align: left; text-decoration: underline;">{{ $data->email }}</p>
            <p style="padding: 0rem 2rem; color:#000; text-align: left; margin-top: 1rem;">{{ $data->phone }}</p>
            <p style="padding: 0rem 2rem; color:#000; text-align: left; margin-top: 1rem;">{{ $data->vendor->website }}</p>

            <div class="location mt-4" style="font-size: 1.2rem; text-align: left; padding: 0px 2rem;">
              {{-- <span style="padding: 2rem 4rem; color:#000; padding-right: 0rem;" class="mdi mdi-map"></span> <span style="padding: 2rem 4rem; color:#000; padding-left: 0rem; font-weight: 500">{{ $data->location }}</span> --}}
              {{-- <span style="padding: 2rem 4rem; color:#000; padding-left: 0rem; font-weight: 500">{{ $data->vendor_founder_name }}</span> --}}
              <img src="{{ asset('user/location.png') }}" alt="" class="img-fluid"> Location
              <br>
              <span style="padding: 2rem 4rem; color:#000; padding-left: 0rem; font-weight: 500">{{ $data->vendor->address }}</span>
            </div>

            <div class="buttons mb-4">
                <a href="tel:{{ $data->phone }}" class="btn btn-success float-left" style="width: 40%; margin: auto; margin-left:1rem !important; margin-top:2rem">
                  <img src="{{ asset('user/call.png') }}" alt="" class="img-fluid"> Call Now
                </a>
                <a href="{{ $data->vendor->website }}" target="_blank" class="btn btn-success float-right" style="width: 40%; margin: auto; margin-right:1rem !important; margin-top:2rem">
                  <img src="{{ asset('user/web.png') }}" alt="" class="img-fluid"> Visit Website
                </a>
            </div>
            
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12 mb-4">
              <h3 class="text-dark">Latest Event</h3>
            </div>
            @foreach ($event as $item)
              @if ($item->vendor->vendor->country_id == Auth::user()->country_id)
                <div class="col-md-6">
                  <div class="card product" style="background-color: #F98513; border-radius:12px;">
                    <img class="img-fluid" src="{{ asset('storage/'.$item->image) }}" width="90%" height="auto" style="margin: auto; padding: 5px;">
                    <p style="padding: 5px; margin:auto; color:#fff">{{ $item->name }}</p>
                    <div class="button" style="text-align: left;">
                    {{-- <a href="{{ route('vendor.service.edit',[$item->id]) }}" style="color:#8f94a1" class="btn btn-transparent"> <span class="mdi mdi-table-edit"></span> Edit</a> --}}
                    <a href="{{ route('user.service.show',[$item->id]) }}" class="btn btn-transparent" style="color:#fff; text-align: left;"> <span class="mdi mdi-eye"></span> View</a>
                    </div>
                </div>
                </div>
              @endif
            @endforeach
            <div class="col-md-12 mt-4 p-4" style="text-align: left;">
              <a href="{{ route('user.service.all',[$data->id]) }}" class="text-dark" style="text-decoration: underline; font-weight: 500; text-align: left;">View All Service</a>
            </div>
          </div>
          <div class="row" style="margin-top: 4rem;">
            <div class="col-md-12 mb-4">
              <h3 class="text-dark">Latest Campaign</h3>
            </div>
            @foreach ($campaign as $item)
              @if ($item->vendor->vendor->country_id == Auth::user()->country_id)
                <div class="col-md-6">
                  <div class="card product" style="background-color: #F98513; border-radius:12px;">
                    <img class="img-fluid" src="{{ asset('storage/'.$item->image) }}" width="90%" height="auto" style="margin: auto; padding: 5px;">
                    <p style="padding: 5px; margin:auto; color:#fff">{{ $item->name }}</p>
                    <div class="button" style="text-align: left;">
                    {{-- <a href="{{ route('vendor.service.edit',[$item->id]) }}" style="color:#8f94a1" class="btn btn-transparent"> <span class="mdi mdi-table-edit"></span> Edit</a> --}}
                    <a href="{{ route('user.product.show',[$item->user_id]) }}" class="btn btn-transparent" style="color:#fff;"> <span class="mdi mdi-eye"></span> View</a>
                    </div>
                </div>
                </div>
              @endif
            @endforeach
            <div class="col-md-12 mt-4 p-4" style="text-align: left;">
              <a href="{{ route('user.product.all',[$data->id]) }}" class="text-dark" style="text-decoration: underline; font-weight: 500">View All Product</a>
            </div>
          </div>
        </div>
      </div>
    </div>




</div>
    
@endsection

