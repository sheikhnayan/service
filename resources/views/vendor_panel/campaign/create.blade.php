 
@extends('vendor_panel.layouts.main')

@section('title')
    Add Campaign
@endsection

@section('content')

<div class="content-wrapper">
    <div class="content">
      <div class="row justify-content-center">
        <div class="col-md-3">
          <form action="{{ route('vendor.campaign.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          
            <input type="file" width="100%" height="122px" style="display: none" id="image" name="image" required>
            <label style="width:100%; height:122px; border-radius: 22px; font-weight: 500; padding-top: 2rem;" for="image" class="text-center bg-light"> 
              <a class="btn btn-success text-light mb-1" style="border-radius: 50%">+</a> <br>
              Upload Campaign Banner 
            </label> <br>

            <label class="mt-4" style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Campaign Name:</label>
            <input name="name" type="text" class="form-control" placeholder="Add Campaign Name..." style="border:unset; border-bottom: 2px solid black; font-size:17px;">

            <label class="mt-4" style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Description:</label>
            <input name="description" type="text" class="form-control" placeholder="Write about your Campaign..." style="border:unset; border-bottom: 2px solid black; font-size:17px;">

            <label class="mt-4" style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Location:</label>
            <input name="location" type="text" class="form-control" placeholder="Your Campaign Location" style="border:unset; border-bottom: 2px solid black; font-size:17px;">

            <input name="contact_number" type="text" class="form-control mt-4" placeholder="Contact Number (ex: +88-0189..)" style="border:unset; border-bottom: 2px solid black; font-size:17px;">

            <input name="link" type="text" class="form-control mt-4" placeholder="Donation Links ex: Paypal.com/donate" style="border:unset; border-bottom: 2px solid black; font-size:17px;">
          
            <button type="submit"  class="btn btn-success mt-4 logout-profile"> Add Campaign</button>
          </form>
          </div>
      </div>
    </div>




</div>
    
@endsection

