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
        @foreach ($data as $item)
            <div class="col-md-3 mt-4">
                <div class="card product" style="background-color: #F98513; border-radius:12px;">
                    <img class="img-fluid" src="{{ asset('storage/'.$item->image) }}" style="margin: auto; padding: 5px;">
                    <p style="padding: 5px; margin:auto; color:#fff">{{ $item->name }}</p>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('user.'.$type.'.show',[$item->id]) }}" class="btn btn-transparent" style="color:#fff;"> <span class="mdi mdi-eye"></span> View</a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('user.'.$type.'.wish',[$item->id]) }}" class="btn btn-transparent float-right" style="color:#fff; font-size: 20px;"> <span class="mdi mdi-heart"></span> </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection