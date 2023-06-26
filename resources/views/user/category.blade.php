@extends('vendor_panel.layouts.main')

@section('title')
    Category
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
            <div class="col-md-3">
                <div class="card product" style="background-color: #F98513; border-radius:12px;">
                    <img class="img-fluid" src="{{ asset('storage/'.$item->image) }}" style="margin: auto; padding: 5px;">
                    <p style="padding: 5px; margin:auto; color:#fff">{{ $item->name }}</p>
                    <div class="button">
                    {{-- <a href="{{ route('vendor.service.edit',[$item->id]) }}" style="color:#8f94a1" class="btn btn-transparent"> <span class="mdi mdi-table-edit"></span> Edit</a> --}}
                    <a href="{{ route('user.'.$type.'.show',[$item->id]) }}" class="btn btn-transparent" style="color:#fff;"> <span class="mdi mdi-eye"></span> View</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection