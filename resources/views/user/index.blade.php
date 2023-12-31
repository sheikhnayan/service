@extends('vendor_panel.layouts.main')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row p-4">
        <div class="col-md-12" style="text-align: center">
            <div class="search-form d-none d-lg-inline-block m-auto" style="width: 35%;">
                <div class="input-group" style="border: 1px solid #B9B9B9; border-radius: 15px;">
                    <input type="text" name="query" id="search-input" class="form-control" placeholder="Search Store,Product, service, event, location..." autofocus="" autocomplete="off" style="border-top-left-radius: 15px; border-bottom-left-radius: 15px;">
                    <button type="button" name="search" id="search-btn" class="btn btn-flat">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                </div>
                <div id="search-results-container">
                    <div id="search-results" style="display: block"></div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row p-4">
        <div class="col-md-12 mb-4">
            <h3 class="text-dark text-left"> Find Services </h3> 
        </div>
        <div class="col-md-1">
            <a class="text-dark" href="{{ route('user.service-category',[0]) }}">
                <div class="card" style="width: 70px; border-radius: 12px;">
                    <img class="img-fluid p-2" src="{{ asset('user/category.png') }}" width="67px" height="67px">

                </div>
                <p class="text-center mt-2" style="width: 70px;"> All  </p>
            </a>
        </div>
        @foreach ($service as $item)
        <div class="col-md-1">
            <a class="text-dark" href="{{ route('user.service-category',[$item->id]) }}">
                <div class="card" style="width: 70px; border-radius: 12px;">
                    <img class="img-fluid p-2" src="{{ asset('storage/'.$item->image) }}" width="67px" height="67px">
                </div>
                <p class="text-center mt-2" style="width: 70px;">  {{ $item->name }} </p>
            </a>
        </div>
        @endforeach
    </div>
    
    <div class="row p-4">
        <div class="col-md-12 mb-4">
            <h3 class="text-dark text-left"> Product Categories </h3> 
        </div>
        <div class="col-md-1">
            <a class="text-dark" href="{{ route('user.product-category',[0]) }}">
                <div class="card" style="width: 70px; border-radius: 12px;">
                    <img class="img-fluid p-2" src="{{ asset('user/category.png') }}" width="67px" height="67px">
                </div>
                <p class="text-center mt-2" style="width: 70px;"> All </p>
            </a>
        </div>
        @foreach ($product as $item)
        <div class="col-md-1">
            <a class="text-dark" href="{{ route('user.product-category',[$item->id]) }}">
                <div class="card" style="width: 70px; border-radius: 12px;">
                    <img class="img-fluid p-2" src="{{ asset('storage/'.$item->image) }}" width="67px" height="67px">
                </div>
                <p class="text-center mt-2" style="width: 70px;"> {{ $item->name }} </p>
            </a>
        </div>
        @endforeach
    </div>

    <div class="row p-4">
        <div class="col-md-12 mb-4">
            <h3 class="text-dark text-left"> Food & Restaurants </h3> 
        </div>
        <div class="col-md-1">
            <a class="text-dark" href="{{ route('user.food-category',[0]) }}">
                <div class="card" style="width: 70px; border-radius: 12px;">
                    <img class="img-fluid p-2" src="{{ asset('user/category.png') }}" width="67px" height="67px">
                </div>
                <p class="text-center mt-2" style="width: 70px;"> All  </p>
            </a>
        </div>
        @foreach ($food as $item)
        <div class="col-md-1">
            <a class="text-dark" href="{{ route('user.food-category',[$item->id]) }}">
                <div class="card" style="width: 70px; border-radius: 12px;">
                    <img class="img-fluid p-2" src="{{ asset('storage/'.$item->image) }}" width="67px" height="67px">
                </div>
                <p class="text-center mt-2" style="width: 70px;">  {{ $item->name }} </p>
            </a>
        </div>
        @endforeach
    </div>


    {{-- <div class="row p-4">
        <div class="col-md-12 mb-4">
            <h3 class="text-dark text-left"> Latest Events </h3> 
        </div>
        @foreach ($event as $item)
            @if ($item->vendor->vendor->country_id == Auth::user()->country_id)
                <div class="col-md-3 mb-4">
                    <div class="card product" style="background-color: #F98513; border-radius:12px;">
                        <img class="img-fluid" src="{{ asset('storage/'.$item->image) }}" style="margin: auto; padding: 5px;">
                        <p style="padding: 5px; margin:auto; color:#fff">{{ $item->name }}</p>
                        <div class="button text-left">
                        <a href="{{ route('user.event.show',[$item->id]) }}" class="btn btn-transparent" style="color:#fff; font-size:1rem"> <span class="mdi mdi-eye"></span> View</a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div> --}}
@endsection