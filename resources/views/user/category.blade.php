@extends('vendor_panel.layouts.main')

@section('title')
    @if ($type == 'product')
    Product
    @elseif($type == 'service')
    Service
    @elseif($type == 'food')
    Food
    @elseif($type == 'event')
    Event
    @elseif($type == 'campaign')
    Campaign
    @endif
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
            <h3 class="text-dark"> All
                @if ($type == 'product')
                    Product
                @elseif($type == 'service')
                    Service
                @elseif($type == 'food')
                    Food
                @elseif($type == 'event')
                    Event
                @elseif($type == 'campaign')
                    Campaign
                @endif
            </h3>
        </div>
        @if (count($data) > 0)
        @foreach ($data as $item)
                <div class="col-md-3 mt-4">
                    <div class="card product" style="background-color: #F98513; border-radius:12px;">
                        <img class="img-fluid" src="{{ asset('storage/'.$item->image) }}" style="margin: auto; padding: 5px;">
                        <p style="padding: 5px; margin:auto; color:#fff">{{ $item->name }}</p>
                        <div class="row">
                            <div class="col-md-6" style="text-align: left;">
                                <a href="{{ route('user.'.$type.'.show',[$item->id]) }}" class="btn btn-transparent" style="color:#fff;"> <span class="mdi mdi-eye"></span> View</a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('user.'.$type.'.wish',[$item->id]) }}" class="btn btn-transparent float-right" style="color:#fff; font-size: 20px;"> <span class="mdi mdi-heart"></span> </a>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
        @else
        <div style="text-align: center; width: 100%;">
            <h2 class="text-center">You Don't Have Any @if ($type == 'product')
                Product
            @elseif($type == 'service')
                Service
            @elseif($type == 'food')
                Food
            @elseif($type == 'event')
                Event
            @elseif($type == 'campaign')
                Campaign
            @endif
            Near You!
            </h2>
        </div>
        @endif
    </div>
@endsection
