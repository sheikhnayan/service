
@extends('vendor_panel.layouts.main')

@section('title')
    Notification
@endsection

@section('content')

<div class="content-wrapper">
    <div class="content">
      <div class="row justify-content-center">

        @if ($data->count() > 0)
          @foreach ($data as $item)
          @if ($item->type == 'visit')
          
            <div class="col-md-4 mb-4">
              <div class="card" style="border-radius: 8px;box-shadow: 1px 2px #e0e0e0;">
                <div class="row">
                  <div class="col-md-4">
                    <img style="height: 100%;width: 100%;" src="{{ asset('vendor_panel/logo.png') }}" alt="">
                  </div>
                  <div class="col-md-8 p-2">
                    {{-- <h4 class="success">admin</h4> --}}
                    <a href="{{ route('vendor.analytics') }}">
                      <p class="text-dark font-weight-bold" style="padding-top:1rem;padding-bottom:1rem;font-size:15px;">You have new {{ $item->page }} view !</p>
                    </a>
                    <span style="font-size: 12px" class="text-dark">{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i') }}</span>
                  </div>
                </div>
              </div>
            </div>

          @elseif($item->type == 'review')
              
          <div class="col-md-4 mb-4">
            <div class="card" style="border-radius: 8px;box-shadow: 1px 2px #e0e0e0;">
              <div class="row">
                <div class="col-md-4">
                  <img style="height: 100%;width: 100%;" src="{{ asset('vendor_panel/logo.png') }}" alt="">
                </div>
                <div class="col-md-8 p-2">
                  {{-- <h4 class="success">admin</h4> --}}
                  <a href="{{ $item->link }}">
                    <p class="text-dark font-weight-bold" style="padding-top:1rem;padding-bottom:1rem;font-size:15px;">You have new {{ $item->page }} Review !</p>
                  </a>
                  <span style="font-size: 12px" class="text-dark">{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i') }}</span>
                </div>
              </div>
            </div>
          </div>

          @endif
          @endforeach
          @else
          <h3 class="text-dark mt-4 p-4">You Don't have Any Notification !</h3>
            
        @endif
      </div>
    </div>




</div>
    
@endsection

