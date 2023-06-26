
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
          @if ($item->type == 'service')
            <div class="col-md-4 mb-4">
              <div class="card" style="border-radius: 8px;box-shadow: 1px 2px #e0e0e0;">
                <div class="row">
                  <div class="col-md-4">
                    <img style="height: 100%;width: 100%;" src="{{ asset('storage/'.$item->service->image) }}" alt="">
                  </div>
                  <div class="col-md-8 p-2">
                    <a href="{{ route('user.service.show',[$item->product_id]) }}">
                      <h4 class="success mt-3">{{ $item->service->name }}</h4>
                      {{-- <p class="text-dark font-weight-bold" style="padding-top:1rem;padding-bottom:1rem;font-size:15px;"></p> --}}
                    </a>
                  </div>
                </div>
              </div>
            </div>
              
          @elseif($item->type == 'product')
            <div class="col-md-4 mb-4">
              <div class="card" style="border-radius: 8px;box-shadow: 1px 2px #e0e0e0;">
                <div class="row">
                  <div class="col-md-4">
                    <img style="height: 100%;width: 100%;" src="{{ asset('storage/'.$item->product->image) }}" alt="">
                  </div>
                  <div class="col-md-8 p-2">
                    <a href="{{ route('user.product.show',[$item->product_id]) }}">
                      <h4 class="success mt-3">{{ $item->product->name }}</h4>
                      {{-- <p class="text-dark font-weight-bold" style="padding-top:1rem;padding-bottom:1rem;font-size:15px;"></p> --}}
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @elseif($item->type == 'food')
              <div class="col-md-4 mb-4">
                <div class="card" style="border-radius: 8px;box-shadow: 1px 2px #e0e0e0;">
                  <div class="row">
                    <div class="col-md-4">
                      <img style="height: 100%;width: 100%;" src="{{ asset('storage/'.$item->food->image) }}" alt="">
                    </div>
                    <div class="col-md-8 p-2">
                      <a href="{{ route('user.food.show',[$item->product_id]) }}">
                        <h4 class="success mt-3">{{ $item->food->name }}</h4>
                        {{-- <p class="text-dark font-weight-bold" style="padding-top:1rem;padding-bottom:1rem;font-size:15px;"></p> --}}
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              @elseif($item->type == 'campaign')
                <div class="col-md-4 mb-4">
                  <div class="card" style="border-radius: 8px;box-shadow: 1px 2px #e0e0e0;">
                    <div class="row">
                      <div class="col-md-4">
                        <img style="height: 100%;width: 100%;" src="{{ asset('storage/'.$item->campaign->image) }}" alt="">
                      </div>
                      <div class="col-md-8 p-2">
                        <a href="{{ route('user.campaign.show',[$item->product_id]) }}">
                          <h4 class="success mt-3">{{ $item->campaign->name }}</h4>
                          {{-- <p class="text-dark font-weight-bold" style="padding-top:1rem;padding-bottom:1rem;font-size:15px;"></p> --}}
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                @elseif($item->type == 'event')
                  <div class="col-md-4 mb-4">
                    <div class="card" style="border-radius: 8px;box-shadow: 1px 2px #e0e0e0;">
                      <div class="row">
                        <div class="col-md-4">
                          <img style="height: 100%;width: 100%;" src="{{ asset('storage/'.$item->event->image) }}" alt="">
                        </div>
                        <div class="col-md-8 p-2">
                          <a href="{{ route('user.event.show',[$item->product_id]) }}">
                            <h4 class="success mt-3">{{ $item->event->name }}</h4>
                            {{-- <p class="text-dark font-weight-bold" style="padding-top:1rem;padding-bottom:1rem;font-size:15px;"></p> --}}
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
          @endif
          @endforeach
            
        @else
            <h3 class="text-dark mt-4 p-4">You Don't have Any Product Added to Wish List Yet !</h3>
        @endif
      </div>
    </div>




</div>
    
@endsection

