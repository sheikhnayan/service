 
@extends('vendor_panel.layouts.main')

@section('title')
    Event
@endsection

@section('content')

<div class="content-wrapper">
    <div class="content">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card" style="border-radius: 8px; background: #f8f9ff">
            <img class="img-fluid" id="imgPreview" src="{{ asset('storage/'.$data->image) }}" alt="" width="90%" height="196px" style="margin: auto; margin-top: 2rem;
            ">

            {{-- <p style="text-align: center; padding: 3rem; color:black">Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. </p> --}}

            <h4 style="text-align: center; padding: 2rem 5rem; color:black; padding-bottom: 1rem !important;">{{ $data->name }}</h4>

            <p style="padding: 1rem 3rem; color:#000;">{{ $data->description }}</p>

            @if ($data->type == 'virtual')
                
            <div class="location" style="padding: 1rem 2.8rem;">
              <img src="{{ asset('vendor_panel/location.png') }}" alt=""><span style="padding: 2rem 4rem; color:#000; padding-left: 0rem; font-weight: 500"> <span style="padding: 2rem 4rem; color:#000; padding-left: 0rem; font-weight: 500">Virtual ({{ $data->location }})</span>
              <img src="{{ asset('vendor_panel/date.png') }}" alt=""> <span style="padding: 2rem 4rem; color:#000; padding-left: 0rem; font-weight: 500">{{ $data->date }}</span>
            </div>

            @else

            <div class="location" style="padding: 1rem 2.8rem;">
              <div class="row">
                <div class="col-md-6">
                  <img src="{{ asset('vendor_panel/location.png') }}" alt=""><span style="padding: 2rem 4rem; color:#000; padding-left: 0rem; font-weight: 500">{{ $data->location }}</span>
                </div>
                <div class="col-md-6">
                  <img src="{{ asset('vendor_panel/date.png') }}" alt=""> <span style="padding: 2rem 4rem; color:#000; padding-left: 0rem; font-weight: 500">{{ $data->date }}</span>
                </div>
              </div>
            </div>
                
            @endif

            <div class="row">
              <div class="col-md-6">
                <a 
                @if ($data->type == 'virtual')
                  href="{{ $data->link }}" 
                  @else
                    href="{{ $data->location }}" 
                  @endif
                class="btn btn-success join" style="width: 90%; margin-left:3rem; margin-top:2rem">
                  @if ($data->type == 'virtual')
                    <img src="{{ asset('vendor_panel/calender.png') }}" alt="">
                    Event Registration 
                  @else
                    <img src="{{ asset('vendor_panel/map.png') }}" alt="">
                    Google map
                  @endif
                </a>
              </div>
  
              @if ($data->type != 'virtual')
                <div class="col-md-6">
                  <a href="{{ $data->link }}" class="btn btn-success join" style="width: 90%; margin-top:2rem">
                      <img src="{{ asset('vendor_panel/calender.png') }}" alt="">
                      Join Event
                    </a>
                </div>
              @endif
            </div>
            

            <div class="button" style="padding: 1rem 3rem">
              <div class="row">
                <div class="col-md-6">
                  <a href="{{ route('vendor.event.edit',[$data->id]) }}" style="color:#8f94a1; padding-left: 0px;" class="btn btn-transparent text-dark"> <span class="mdi mdi-table-edit"></span> Edit Product</a>
                </div>
              </div>
            </div> 
            
          </div>
        </div>
      </div>
    </div>




</div>
    
@endsection

