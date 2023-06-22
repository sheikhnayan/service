 
@extends('vendor_panel.layouts.main')

@section('title')
    Add Event
@endsection

@section('content')

<div class="content-wrapper">
    <div class="content">
      <div class="row justify-content-center">
        <div class="col-md-3">
          <form action="{{ route('vendor.event.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          
            <input type="file" width="100%" height="122px" style="display: none" id="image" name="image" required>
            <label style="width:100%; height:122px; border-radius: 22px; font-weight: 500; padding-top: 2rem;" for="image" class="text-center bg-light"> 
              <a class="btn btn-success text-light mb-1" style="border-radius: 50%">+</a> <br>
              Upload Event Banner 
            </label> <br>

            <label class="mt-4" style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Event Name:</label>
            <input name="name" type="text" class="form-control" placeholder="Add Event Name..." style="border:unset; border-bottom: 2px solid black; font-size:17px;">

            <label class="mt-4" style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Description:</label>
            <input name="description" type="text" class="form-control" placeholder="Write about your Event..." style="border:unset; border-bottom: 2px solid black; font-size:17px;">

            <div class="input-group mt-4">
              <label style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold; margin-top:0.5rem; margin-right: 1rem;"> Event Type: </label>
              <input name="type" type="radio" id="virtual" value="virtual" checked>
              <label style="width: 20%; font-weight:bold; margin-left: 1rem; margin-top: .5rem;" for="virtual">Virtual</label>
              <input name="type" type="radio" id="physical" value="physical">
              <label style="width: 20%; font-weight:bold; margin-left: 1rem; margin-top: .5rem;" for="physical">Physical</label>
            </div>

            <div class="input-group mt-4">
              <label style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold; margin-top:0.5rem; margin-right: 1rem;"> Date: </label>
              <input name="date" type="date" class="form-control">
            </div>

            <label class="mt-4" style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Event Link:</label>
            <input name="link" type="text" class="form-control" placeholder="Event Link" style="border:unset; border-bottom: 2px solid black; font-size:17px;">

            <label class="mt-4" style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Event Location:</label>
            <input name="location" type="text" class="form-control" placeholder="Event Location" style="border:unset; border-bottom: 2px solid black; font-size:17px;">
          
            <button type="submit"  class="btn btn-success mt-4 logout-profile"> Add Event</button>
          </form>
          </div>
      </div>
    </div>




</div>
    
@endsection

