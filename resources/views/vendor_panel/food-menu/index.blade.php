
@extends('vendor_panel.layouts.main')

@section('title')
    Food Menu
@endsection

@section('head')
    <link rel="stylesheet" href="http://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endsection

@section('content')

<div class="content-wrapper">
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <h4 class="float-left">All Food Menus</h4>
          <a href="{{ route('vendor.food-menu.create') }}" class="btn btn-success float-right">Add New</a>
        </div>
        @if ($data->count() == 0)
        <div class="col-md-12 text-center mt-4 text-dark">
          <h4>You haven't added any food yet! </h4>
          <a class="btn btn-success mt-2" href="{{ route('vendor.food-menu.create') }}">Add New</a>
        </div>
        @endif
        @foreach ($data as $item)
          <div class="col-md-2" style="margin-top: 2rem;">
            <div class="card product" style="background-color: #F8F9FF; border-raduis:12px;">
              <img src="{{ asset('storage/'.$item->image) }}" width="151px" height="70px" style="margin: auto; padding: 5px;">
              <p style="padding: 5px; margin:auto;">{{ $item->name }}</p>
              <div class="button">
                <a href="{{ route('vendor.food-menu.edit',[$item->id]) }}" style="color:#8f94a1" class="btn btn-transparent"> <span class="mdi mdi-table-edit"></span> Edit</a>
                <a href="{{ route('vendor.food-menu.show',[$item->id]) }}" class="btn btn-transparent" style="color:#8f94a1; float: right;"> <span class="mdi mdi-eye"></span> View</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>




</div>
    
@endsection


@section('js')
    
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

  <script>
    let table = new DataTable('.table');
  </script>

@endsection
