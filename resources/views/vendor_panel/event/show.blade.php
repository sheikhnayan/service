 
@extends('vendor_panel.layouts.main')

@section('title')
    Event
@endsection

@section('content')

<div class="content-wrapper">
    <div class="content">
      <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card" style="border-radius: 8px; background: #f8f9ff">
            <img src="{{ asset('storage/'.$data->image) }}" alt="" width="403px" height="196px" style="margin: auto; margin-top: 2rem;
            ">

            {{-- <p style="text-align: center; padding: 3rem; color:black">Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. </p> --}}

            <h4 style="text-align: center; padding: 2rem 5rem; color:black">{{ $data->name }}</h4>

            <p style="padding: 2rem 4rem; color:#000;">{{ $data->description }}</p>

            @if ($data->type == 'virtual')
                
            <div class="location">
              <span style="padding: 2rem 4rem; color:#000; padding-right: 0rem;" class="mdi mdi-map"></span> <span style="padding: 2rem 4rem; color:#000; padding-left: 0rem; font-weight: 500">Virtual (zoom/meet)</span>
              <span style="padding: 2rem 4rem; color:#000; padding-right: 0rem;" class="mdi mdi-note-outline"></span> <span style="padding: 2rem 4rem; color:#000; padding-left: 0rem; font-weight: 500">{{ $data->date }}</span>
            </div>

            @else

            <div class="location">
              <span style="padding: 2rem 4rem; color:#000; padding-right: 0rem;" class="mdi mdi-map"></span> <span style="padding: 2rem 4rem; color:#000; padding-left: 0rem; font-weight: 500">{{ $data->location }}</span>
              <span style="padding: 2rem 4rem; color:#000; padding-right: 0rem;" class="mdi mdi-note-outline"></span> <span style="padding: 2rem 4rem; color:#000; padding-left: 0rem; font-weight: 500">{{ $data->date }}</span>
            </div>
                
            @endif
            
            <div class="col-md-6">
              <a href="{{ $data->link }}" class="btn btn-success" style="width: 90%; margin-left:3rem; margin-top:2rem">
                @if ($data->type == 'virtual')
                  Add To Calender
                @else
                  Google map
                @endif
              </a>
            </div>

            <div class="button" style="padding: 1rem 4rem">
              <a href="{{ route('vendor.event.edit',[$data->id]) }}" style="color:#8f94a1" class="btn btn-transparent text-dark"> <span class="mdi mdi-table-edit"></span> Edit Product</a>
              {{-- <a href="{{ route('vendor.event.review') }}" class="btn btn-transparent text-dark" style="float: right;"> <span class="mdi mdi-eye"></span> View All Reviews</a> --}}
            </div> 
            
          </div>
        </div>
      </div>
    </div>




</div>
    
@endsection

