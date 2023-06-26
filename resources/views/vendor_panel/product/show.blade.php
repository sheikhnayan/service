
@extends('vendor_panel.layouts.main')

@section('title')
    Product
@endsection

@section('content')

<div class="content-wrapper">
    <div class="content">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card" style="border-radius: 8px; background: #f8f9ff">
            <img class="img-fluid" src="{{ asset('storage/'.$data->image) }}" alt="" width="403px" height="196px" style="margin: auto; margin-top: 2rem;
            ">

            {{-- <p style="text-align: center; padding: 3rem; color:black">Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. </p> --}}

            <h4 style="text-align: center; padding: 2rem 5rem; color:black">{{ $data->name }}</h4>

            <p style="padding: 2rem 4rem; color:#000;">{{ $data->description }}</p>

            <div class="row" style="padding: 1rem 4rem;">
              <div class="col-md-6 text-dark mb-3">
                <span class="font-weight-bold">Category:</span> {{ $data->category->name }}
              </div>
              <div class="col-md-6 text-dark mb-3">
                <span class="font-weight-bold">Sub Category:</span> {{ $data->sub_category->name }}
              </div>
              <div class="col-md-6 text-dark mb-3">
                <span class="font-weight-bold">Status:</span> 
                @if ($data->status == 1)
                  <span class="text-success font-weight-bold">
                  In Stock
                  </span>
                  @else
                  <span class="text-danger font-weight-bold">
                    Out of Stock
                  </span> 
                  @endif
              </div>
              <div class="col-md-6 text-dark mb-3">
                <span class="font-weight-bold">Color:</span> {{ $data->color }}
              </div>
              <div class="col-md-6 text-dark mb-3">
                <span class="font-weight-bold">Model:</span> {{ $data->model }}
              </div>
              <div class="col-md-6 text-dark mb-3">
                <span class="font-weight-bold">Price:</span>  <span style="color: orange"> {{ $data->price }}$ </span>
              </div>
              <div class="col-md-6">
                <a href="{{ $data->link }}" target="_blank" class="btn btn-success" style="width: 90%">Buy Now</a>
              </div>
              <div class="col-md-6 text-dark mb-3">
                <span class="font-weight-bold">Rating:</span> 
                <span style="color: orange; font-size: 17px;" class="mdi mdi-star"></span>
                <span style="color: orange; font-size: 17px;" class="mdi mdi-star"></span>
                <span style="color: orange; font-size: 17px;" class="mdi mdi-star"></span>
                <span style="color: orange; font-size: 17px;" class="mdi mdi-star"></span>
                <span style="color: orange; font-size: 17px;" class="mdi mdi-star"></span>
              </div>
            </div>
            <div class="button" style="padding: 1rem 4rem">
              <div class="row">
                <div class="col-md-6">
                  <a href="{{ route('vendor.product.edit',[$data->id]) }}" style="color:#8f94a1" class="btn btn-transparent text-dark"> <span class="mdi mdi-table-edit"></span> Edit Product</a>
                </div>
                <div class="col-md-6">
                  <a href="{{ route('vendor.product.review',[$data->id]) }}" class="btn btn-transparent text-dark"> <span class="mdi mdi-eye"></span> View All Reviews</a>
                </div>
              </div>
            </div> 
            
          </div>
        </div>
      </div>
    </div>




</div>
    
@endsection

