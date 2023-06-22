
@extends('vendor_panel.layouts.main')

@section('title')
    Become a preferred vendor
@endsection                                

@section('content')

<div class="content-wrapper">
    <div class="content">
      <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card" style="border-radius: 8px; background: #f8f9ff">
            <img src="{{ asset('vendor_panel/logo.png') }}" alt="">

            <p style="text-align: center; padding: 3rem; color:black">Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. </p>

            <h3 style="text-align: center; padding: 2rem 6rem; color:black">Benefits of become a 
              preferred vendor</h3>

              <ul style="padding: 2rem 0rem; margin:auto; color:black">
                <li style="margin-bottom: 0.7rem"> <input type="checkbox" checked disabled> You can list your business in our app</li>
                <li style="margin-bottom: 0.7rem"> <input type="checkbox" checked disabled> users can find your business on our app</li>
                <li style="margin-bottom: 0.7rem"> <input type="checkbox" checked disabled> users can find your business on our app</li>
                <li style="margin-bottom: 0.7rem"> <input type="checkbox" checked disabled> users can find your business on our app</li>
                <li style="margin-bottom: 0.7rem"> <input type="checkbox" checked disabled> users can find your business on our app</li>
                <li style="margin-bottom: 0.7rem"> <input type="checkbox" checked disabled> users can find your business on our app</li>
              </ul>

              <span style="display: block; width: 90%; height: 2px; background: #181818; margin: auto;"></span>

              <a class="btn btn-success" href="3" style="margin: auto; width: 15rem; margin-top: 2rem; margin-bottom: 2rem; border-radius: 10px; padding: 15px 10px;"> Appy for preffred vendor</a>
          </div>
        </div>
      </div>
    </div>




</div>
    
@endsection

