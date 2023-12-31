
@extends('vendor_panel.layouts.main')

@section('title')
    Service
@endsection

@section('content')

<div class="content-wrapper">
    <div class="content">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card" style="border-radius: 8px; background: #f8f9ff">
            <img id="imgPreview" class="img-fluid" src="{{ asset('storage/'.$data->image) }}" alt="" width="403px" height="196px" style="margin: auto; margin-top: 2rem;
            ">

            {{-- <p style="text-align: center; padding: 3rem; color:black">Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. </p> --}}

            <h4 style="text-align: center; padding: 2rem 5rem; color:black; padding-bottom: 1rem !important;">{{ $data->name }}</h4>

            <p style="padding: 1rem 4rem; color:#000;">{{ $data->description }}</p>

            <div class="row" style="padding: 1rem 4rem;">
              <div class="col-md-6 text-dark mb-3">
                <span class="font-weight-bold">Category:</span> {{ $data->category->name }}
              </div>
              <div class="col-md-6 text-dark mb-3">
                <span class="font-weight-bold">Sub Category:</span> {{ $data->sub_category->name }}
              </div>
              {{-- <div class="col-md-6 text-dark mb-3">
                <span class="font-weight-bold">Status:</span> <span class="text-success font-weight-bold">In Stock</span>
              </div> --}}
              {{-- <div class="col-md-6 text-dark mb-3">
                <span class="font-weight-bold">Color:</span> White
              </div> --}}
              {{-- <div class="col-md-6 text-dark mb-3">
                <span class="font-weight-bold">Model:</span> Black Square 3.ft
              </div> --}}
              <div class="col-md-6 text-dark mb-3">
                <span class="font-weight-bold">Starts from:</span>  <span style="color: orange"> {{ $data->price }}$ </span>
              </div>
              <div class="col-md-6 text-dark mb-3">
                <span class="font-weight-bold">Rating:</span> 
                @php
                    $rating = DB::table('reviews')->where('type','service')->where('product_id',$data->id)->avg('rating');
                @endphp

                @for ($i = 1; $i <= $rating; $i++)
                  <span style="color: orange; font-size: 17px;" class="mdi mdi-star"></span>  
                @endfor

                @php
                    $remain = 5 - $rating;
                @endphp

                @for ($g = 1; $g <= $remain; $g++)
                  <span style="font-size: 17px;" class="mdi mdi-star"></span>   
                @endfor
              </div>
              <div class="col-md-6">
                <a href="{{ $data->link }}" target="_blank" class="btn btn-success" style="width: 90%">Learn More</a>
              </div>
              <div class="col-md-6">
                <a href="tel:{{ $data->contact_number }}" class="btn btn-success" style="width: 90%">Call Now</a>
              </div>
            </div>
            <div class="button" style="padding: 1rem 4rem">
              <div class="row">
                <div class="col-md-6">
                  <a href="{{ route('vendor.service.edit',[$data->id]) }}" style="color:#8f94a1" class="btn btn-transparent text-dark"> <span class="mdi mdi-table-edit"></span> Edit Product</a>
                </div>
                <div class="col-md-6">
                  <a href="{{ route('vendor.service.review',[$data->id]) }}" class="btn btn-transparent text-dark"> <span class="mdi mdi-eye"></span> View All Reviews</a>
                </div>
              </div>
            </div> 
            
          </div>
        </div>
      </div>
    </div>




</div>
    
@endsection

