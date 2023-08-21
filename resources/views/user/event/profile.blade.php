 
@extends('vendor_panel.layouts.main')

@section('title')
    Campaign
@endsection

@section('content')

<div class="content-wrapper">
    <div class="content">
      <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card" style="border-radius: 8px; background: #f8f9ff">
            <img class="img-fluid" src="{{ asset('storage/'.$data->vendor->logo) }}" alt="" width="403px" height="196px" style="margin: auto; margin-top: 2rem;
            ">

            {{-- <p style="text-align: center; padding: 3rem; color:black">Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. </p> --}}

            <h4 style="text-align: center; padding: 2rem 5rem; color:black">{{ $data->vendor->company_name }}</h4>

            <p style="padding: 2rem 4rem; color:#000;">{{ $data->vendor->address }}</p>

            <div class="location">
              {{-- <span style="padding: 2rem 4rem; color:#000; padding-right: 0rem;" class="mdi mdi-map"></span> <span style="padding: 2rem 4rem; color:#000; padding-left: 0rem; font-weight: 500">{{ $data->location }}</span> --}}
              <span style="padding: 2rem 4rem; color:#000; padding-left: 0rem; font-weight: 500">{{ $data->vendor_founder_name }}</span>
              <br>
              <span style="padding: 2rem 4rem; color:#000; padding-right: 0rem;" class="mdi mdi-note-outline"></span> <span style="padding: 2rem 4rem; color:#000; padding-left: 0rem; font-weight: 500">{{ $data->vendor->address }}</span>
            </div>

            <div class="buttons mb-4">
                <a href="tel:{{ $data->phone }}" class="btn btn-success float-left" style="width: 40%; margin: auto; margin-left:1rem !important; margin-top:2rem">
                  Call Now
                </a>
                <a href="{{ $data->link }}" target="_blank" class="btn btn-success float-right" style="width: 40%; margin: auto; margin-right:1rem !important; margin-top:2rem">
                  Donate Now
                </a>
            </div>
            
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12 mb-4">
              <h3 class="text-dark">Latest Events</h3>
            </div>
            @foreach ($event as $item)
              @if ($item->vendor->vendor->country_id == Auth::user()->country_id)
                <div class="col-md-6">
                  <div class="card product" style="background-color: #F98513; border-radius:12px;">
                    <img class="img-fluid" src="{{ asset('storage/'.$item->image) }}" width="90%" height="auto" style="margin: auto; padding: 5px;">
                    <p style="padding: 5px; margin:auto; color:#fff">{{ $item->name }}</p>
                    <div class="button">
                    {{-- <a href="{{ route('vendor.service.edit',[$item->id]) }}" style="color:#8f94a1" class="btn btn-transparent"> <span class="mdi mdi-table-edit"></span> Edit</a> --}}
                    <a href="{{ route('user.event.show',[$item->id]) }}" class="btn btn-transparent" style="color:#fff;"> <span class="mdi mdi-eye"></span> View</a>
                    </div>
                </div>
                </div>
              @endif
            @endforeach
            <div class="col-md-12 mt-4 p-4">
              <a href="#" class="text-dark" style="text-decoration: underline; font-weight: 500">View All Event</a>
            </div>
          </div>
          <div class="row" style="margin-top: 4rem;">
            <div class="col-md-12 mb-4">
              <h3 class="text-dark">Latest Campaigns</h3>
            </div>
            @foreach ($campaign as $item)
              <div class="col-md-6">
                <div class="card product" style="background-color: #F98513; border-radius:12px;">
                  <img class="img-fluid" src="{{ asset('storage/'.$item->image) }}" width="90%" height="auto" style="margin: auto; padding: 5px;">
                  <p style="padding: 5px; margin:auto; color:#fff">{{ $item->name }}</p>
                  <div class="button">
                  {{-- <a href="{{ route('vendor.service.edit',[$item->id]) }}" style="color:#8f94a1" class="btn btn-transparent"> <span class="mdi mdi-table-edit"></span> Edit</a> --}}
                  <a href="{{ route('user.campaign.all',[$item->user_id]) }}" class="btn btn-transparent" style="color:#fff;"> <span class="mdi mdi-eye"></span> View</a>
                  </div>
              </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>




</div>
    
@endsection

