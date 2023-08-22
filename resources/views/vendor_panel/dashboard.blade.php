
@extends('vendor_panel.layouts.main')

@section('title')
    Dashboard
@endsection

@section('head')
    <link rel="stylesheet" href="http://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endsection

@section('content')

<div class="content-wrapper">
    <div class="content">
      @if (Auth::user()->vendor->business_type == 'business')
          
        <div class="row">
          <div class="col-md-12">
            <h4 class="float-left">All Products</h4>
            <a href="{{ route('vendor.product.index') }}" class="btn btn-success float-right">See All</a>
          </div>
          @if ($product->count() == 0)
          <div class="col-md-12 text-center mt-4 text-dark">
            <h4>You haven't added any product yet! </h4>
            <a class="btn btn-success mt-2" href="{{ route('vendor.product.create') }}">Add New</a>
          </div>
          @endif
          @foreach ($product as $item)
            <div class="col-md-3" style="margin-top: 2rem;">
              <div class="card product" style="background-color: #F8F9FF; border-raduis:12px;">
                <img class="img-fluid" src="{{ asset('storage/'.$item->image) }}" style="margin: auto; padding: 5px;" width="363px" height="200px">
                <p style="padding: 5px; margin:auto;">{{ $item->name }}</p>
                <div class="button">
                  <a href="{{ route('vendor.product.edit',[$item->id]) }}" style="color:#8f94a1" class="btn btn-transparent"> <span class="mdi mdi-table-edit"></span> Edit</a>
                  <a href="{{ route('vendor.product.show',[$item->id]) }}" class="btn btn-transparent" style="color:#8f94a1; float: right;"> <span class="mdi mdi-eye"></span> View</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="row" style="margin-top: 4rem">
          <div class="col-md-12">
            <h4 class="float-left">All Service</h4>
            <a href="{{ route('vendor.service.index') }}" class="btn btn-success float-right">See All</a>
          </div>
          @if ($service->count() == 0)
          <div class="col-md-12 text-center mt-4 text-dark">
            <h4>You haven't added any service yet! </h4>
            <a class="btn btn-success mt-2" href="{{ route('vendor.service.create') }}">Add New</a>
          </div>
          @endif
          @foreach ($service as $item)
            <div class="col-md-3" style="margin-top: 2rem;">
              <div class="card product" style="background-color: #F8F9FF; border-raduis:12px;">
                <img class="img-fluid" src="{{ asset('storage/'.$item->image) }}" style="margin: auto; padding: 5px;" width="363px" height="200px">
                <p style="padding: 5px; margin:auto;">{{ $item->name }}</p>
                <div class="button">
                  <a href="{{ route('vendor.service.edit',[$item->id]) }}" style="color:#8f94a1" class="btn btn-transparent"> <span class="mdi mdi-table-edit"></span> Edit</a>
                  <a href="{{ route('vendor.service.show',[$item->id]) }}" class="btn btn-transparent" style="color:#8f94a1; float: right;"> <span class="mdi mdi-eye"></span> View</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="row" style="margin-top: 4rem">
          <div class="col-md-12">
            <h4 class="float-left">All Food</h4>
            <a href="{{ route('vendor.food-menu.index') }}" class="btn btn-success float-right">See All</a>
          </div>
          @if ($food->count() == 0)
          <div class="col-md-12 text-center mt-4 text-dark">
            <h4>You haven't added any food menu yet! </h4>
            <a class="btn btn-success mt-2" href="{{ route('vendor.food-menu.create') }}">Add New</a>
          </div>
          @endif
          @foreach ($food as $item)
            <div class="col-md-3" style="margin-top: 2rem;">
              <div class="card product" style="background-color: #F8F9FF; border-raduis:12px;">
                <img class="img-fluid" src="{{ asset('storage/'.$item->image) }}" style="margin: auto; padding: 5px;" width="363px" height="200px">
                <p style="padding: 5px; margin:auto;">{{ $item->name }}</p>
                <div class="button">
                  <a href="{{ route('vendor.food-menu.edit',[$item->id]) }}" style="color:#8f94a1" class="btn btn-transparent"> <span class="mdi mdi-table-edit"></span> Edit</a>
                  <a href="{{ route('vendor.food-menu.show',[$item->id]) }}" class="btn btn-transparent" style="color:#8f94a1; float: right;"> <span class="mdi mdi-eye"></span> View</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>

      @else

        <div class="row">
          <div class="col-md-12">
            <h4 class="float-left">All Campaign</h4>
            <a href="{{ route('vendor.campaign.index') }}" class="btn btn-success float-right">See All</a>
          </div>
          @if ($campaign->count() == 0)
          <div class="col-md-12 text-center mt-4 text-dark">
            <h4>You haven't added any campaign yet! </h4>
            <a class="btn btn-success mt-2" href="{{ route('vendor.campaign.create') }}">Add New</a>
          </div>
          @endif
          @foreach ($campaign as $item)
            <div class="col-md-3" style="margin-top: 2rem;">
              <div class="card product" style="background-color: #F8F9FF; border-raduis:12px;">
                <img class="img-fluid" src="{{ asset('storage/'.$item->image) }}" style="margin: auto; padding: 5px;" width="363px" height="200px">
                <p style="padding: 5px; margin:auto;">{{ $item->name }}</p>
                <div class="button">
                  <a href="{{ route('vendor.campaign.edit',[$item->id]) }}" style="color:#8f94a1" class="btn btn-transparent"> <span class="mdi mdi-table-edit"></span> Edit</a>
                  <a href="{{ route('vendor.campaign.show',[$item->id]) }}" class="btn btn-transparent" style="color:#8f94a1; float: right;"> <span class="mdi mdi-eye"></span> View</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="row" style="margin-top: 4rem">
          <div class="col-md-12">
            <h4 class="float-left">All Event</h4>
            <a href="{{ route('vendor.event.index') }}" class="btn btn-success float-right">See All</a>
          </div>
          @if ($event->count() == 0)
          <div class="col-md-12 text-center mt-4 text-dark">
            <h4>You haven't added any event yet! </h4>
            <a class="btn btn-success mt-2" href="{{ route('vendor.event.create') }}">Add New</a>
          </div>
          @endif
          @foreach ($event as $item)
            <div class="col-md-3" style="margin-top: 2rem;">
              <div class="card product" style="background-color: #F8F9FF; border-raduis:12px;">
                <img class="img-fluid" src="{{ asset('storage/'.$item->image) }}" style="margin: auto; padding: 5px;" width="363px" height="200px">
                <p style="padding: 5px; margin:auto;">{{ $item->name }}</p>
                <div class="button">
                  <a href="{{ route('vendor.event.edit',[$item->id]) }}" style="color:#8f94a1" class="btn btn-transparent"> <span class="mdi mdi-table-edit"></span> Edit</a>
                  <a href="{{ route('vendor.event.show',[$item->id]) }}" class="btn btn-transparent" style="color:#8f94a1; float: right;"> <span class="mdi mdi-eye"></span> View</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
          
      @endif
    </div>




</div>
    
@endsection


@section('js')
    
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

  <script>
    let table = new DataTable('.table');
  </script>

@endsection
