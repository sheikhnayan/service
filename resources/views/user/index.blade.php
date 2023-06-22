@extends('vendor_panel.layouts.main')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row p-4">
        <div class="col-md-12 mb-4">
            <h3 class="text-dark"> Product Categories </h3> 
        </div>
        <div class="col-md-1">
            <div class="card" style="width: 70px; border-radius: 12px;">
                <img src="{{ asset('user/category.png') }}" width="67px" height="67px">
            </div>
            <p class="text-center" style="width: 70px;"> <a class="text-dark" href="{{ route('user.category',[0]) }}"> All </a> </p>
        </div>
        @foreach ($product as $item)
        <div class="col-md-1">
            <div class="card" style="width: 70px; border-radius: 12px;">
                <img src="{{ asset('user/category.png') }}" width="67px" height="67px">
            </div>
            <p class="text-center" style="width: 70px;"> <a class="text-dark" href="{{ route('user.category',[$item->id]) }}"> {{ $item->name }} </a> </p>
        </div>
        @endforeach
    </div>

    <div class="row p-4">
        <div class="col-md-12 mb-4">
            <h3 class="text-dark"> Food & Restaurants </h3> 
        </div>
        <div class="col-md-1">
            <div class="card" style="width: 70px; border-radius: 12px;">
                <img src="{{ asset('user/category.png') }}" width="67px" height="67px">
            </div>
            <p class="text-center" style="width: 70px;"> <a class="text-dark" href="{{ route('user.category',[0]) }}"> All </a> </p>
        </div>
        @foreach ($food as $item)
        <div class="col-md-1">
            <div class="card" style="width: 70px; border-radius: 12px;">
                <img src="{{ asset('user/category.png') }}" width="67px" height="67px">
            </div>
            <p class="text-center" style="width: 70px;"> <a class="text-dark" href="{{ route('user.category',[$item->id]) }}"> {{ $item->name }} </a> </p>
        </div>
        @endforeach
    </div>

    <div class="row p-4">
        <div class="col-md-12 mb-4">
            <h3 class="text-dark"> Find Services </h3> 
        </div>
        <div class="col-md-1">
            <div class="card" style="width: 70px; border-radius: 12px;">
                <img src="{{ asset('user/category.png') }}" width="67px" height="67px">
            </div>
            <p class="text-center" style="width: 70px;"> <a class="text-dark" href="{{ route('user.category',[0]) }}"> All </a> </p>
        </div>
        @foreach ($service as $item)
        <div class="col-md-1">
            <div class="card" style="width: 70px; border-radius: 12px;">
                <img src="{{ asset('user/category.png') }}" width="67px" height="67px">
            </div>
            <p class="text-center" style="width: 70px;"> <a class="text-dark" href="{{ route('user.category',[$item->id]) }}"> {{ $item->name }} </a> </p>
        </div>
        @endforeach
    </div>

    <div class="row p-4">
        <div class="col-md-12 mb-4">
            <h3 class="text-dark"> Latest Events </h3> 
        </div>
        @foreach ($event as $item)
            <div class="col-md-2">
                <div class="card product" style="background-color: #F98513; border-radius:12px;">
                    <img src="{{ asset('storage/'.$item->image) }}" width="151px" height="70px" style="margin: auto; padding: 5px;">
                    <p style="padding: 5px; margin:auto; color:#fff">{{ $item->name }}</p>
                    <div class="button">
                    {{-- <a href="{{ route('vendor.service.edit',[$item->id]) }}" style="color:#8f94a1" class="btn btn-transparent"> <span class="mdi mdi-table-edit"></span> Edit</a> --}}
                    <a href="{{ route('vendor.event.show',[$item->id]) }}" class="btn btn-transparent" style="color:#fff;"> <span class="mdi mdi-eye"></span> View</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection