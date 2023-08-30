@extends('vendor_panel.layouts.main')

@section('title')
    Donate to non profit
@endsection

@section('content')
    <div class="row p-4">
        <div class="col-md-12 mb-4">
            <h3 class="text-dark"> All Campaign Category</h3> 
        </div>
        @foreach ($data as $item)
            <div class="col-md-3">
                <div class="card product" style="background-color: #F98513; border-radius:12px;">
                    <img class="img-fluid" src="{{ asset('storage/'.$item->logo) }}" style="margin: auto; padding: 5px; width: 100px; min-height: 100px;">
                    <p style="padding: 5px; margin:auto; color:#fff; font-weight: bold;">{{ $item->company_name }}</p>
                    <p style="padding: 5px; margin:auto; color:#fff">{{ $item->address }}</p>
                    <div class="button">
                    <a href="{{ route('user.campaign.profile',[$item->id]) }}" class="btn btn-transparent" style="color:#fff;"> <span class="mdi mdi-eye"></span> View</a>
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-1">
                <div class="card" style="width: 70px; border-radius: 12px;">
                    <img class="img-fluid p-2" src="{{ asset('storage/'.$item->image) }}" width="67px" style="height: 67px">
                </div>
                <p class="text-center mt-2" style="width: 70px;"> <a class="text-dark" href="{{ route('user.campaign-category',[$item->id]) }}"> {{ $item->name }} </a> </p>
            </div> --}}
        @endforeach
    </div>
@endsection