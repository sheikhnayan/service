@extends('vendor_panel.layouts.main')

@section('title')
    Event
@endsection

@section('content')
    <div class="row p-4">
        <div class="col-md-12 mb-4">
            <h3 class="text-dark"> All Event </h3> 
        </div>
        @foreach ($data as $item)
            @if ($item->vendor->vendor->country_id == Auth::user()->country_id)
                <div class="col-md-3 mt-4 mt-4">
                    <div class="card product" style="background-color: #F98513; border-radius:12px;">
                        <img class="img-fluid" src="{{ asset('storage/'.$item->image) }}" style="margin: auto; padding: 5px;">
                        <p style="padding: 5px; margin:auto; color:#fff">{{ $item->name }}</p>
                        <div class="button">
                        {{-- <a href="{{ route('vendor.service.edit',[$item->id]) }}" style="color:#8f94a1" class="btn btn-transparent"> <span class="mdi mdi-table-edit"></span> Edit</a> --}}
                        <a href="{{ route('user.event.show',[$item->id]) }}" class="btn btn-transparent" style="color:#fff;"> <span class="mdi mdi-eye"></span> View</a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection