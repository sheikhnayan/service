@extends('vendor_panel.layouts.main')

@section('title')
    Campaign Category
@endsection

@section('content')
    <div class="row p-4">
        <div class="col-md-12 mb-4">
            <h3 class="text-dark"> All Campaign Categorised Profile</h3> 
        </div>
        @foreach ($data as $item)
            <div class="col-md-3 mt-4">
                <div class="card product p-4" style="background-color: #dee1f1; border-radius:12px;">
                    <img class="img-fluid" src="{{ asset('storage/'.$item->logo) }}" style="margin: auto; padding: 5px;">
                    <h4 style="padding: 5px; margin:auto; color:#000">{{ $item->company_name }}</h4>
                    <p style="padding: 5px; color:#000">Founder: {{ $item->founder_name }}</p>
                    <p style="padding: 5px; color:#000">{{ $item->address }}</p>
                    <div class="button">
                    <a href="{{ route('user.campaign.profile',[$item->id]) }}" class="btn btn-success" style="color:#fff;"> <span class="mdi mdi-eye"></span> View Profile</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection