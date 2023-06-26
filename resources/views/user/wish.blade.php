
@extends('vendor_panel.layouts.main')

@section('title')
    Wish List
@endsection

@section('content')

<div class="content-wrapper">
    <div class="content">
      <div class="row justify-content-center">

        @if ($data->count() > 0)
          @foreach ($data as $item)
            <div class="col-md-4 mb-4">
              <div class="card" style="border-radius: 8px;box-shadow: 1px 2px #e0e0e0;">
                <div class="row">
                  <div class="col-md-4">
                    <img style="height: 100%;width: 100%;" src="" alt="">
                  </div>
                  <div class="col-md-8 p-2">
                    {{-- <h4 class="success">admin</h4> --}}
                    <a href="{{ route('vendor.analytics') }}">
                      <p class="text-dark font-weight-bold" style="padding-top:1rem;padding-bottom:1rem;font-size:15px;"></p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
            
        @else
            <h3 class="text-dark mt-4 p-4">You Don't have Any Product Added to Wish List Yet !</h3>
        @endif
      </div>
    </div>




</div>
    
@endsection
