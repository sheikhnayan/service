
@extends('vendor_panel.layouts.main')

@section('title')
    Services
@endsection

@section('head')
    <link rel="stylesheet" href="http://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endsection

@section('content')

<div class="content-wrapper">
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <h4>All Services</h4>
          <table class="table">
            <thead>
              <tr>
                <th>id</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
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
