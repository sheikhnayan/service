
@extends('vendor_panel.layouts.main')

@section('title')
    Add Service
@endsection

@section('content')

<div class="content-wrapper">
    <div class="content">
      <div class="row justify-content-center">
        <div class="col-md-3">
          <form action="{{ route('vendor.service.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" width="100%" height="122px" style="display: none" id="image" name="image">
            <label style="width:100%; height:122px; border-radius: 22px; font-weight: 500; padding-top: 2rem;" for="image" class="text-center bg-light"> 
              <a class="btn btn-success text-light mb-1" style="border-radius: 50%">+</a> <br>
              Upload Service Image 
            </label> <br>

            <label class="mt-4" style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Service Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Add Service Name..." style="border:unset; border-bottom: 2px solid black; font-size:17px;">

            <label class="mt-4" style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Description:</label>
            <input type="text" name="description" class="form-control" placeholder="Write about your Service..." style="border:unset; border-bottom: 2px solid black; font-size:17px;">
        
            <div class="input-group mt-4">
              <label style="width: 60%; font-weight:bold">Caregory: </label>
              @php
                $category = DB::table('service_categories')->get();
              @endphp
              <select style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;" name="category_id" id="category_id" class="form-control">
                @foreach ($category as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="input-group mt-4">
              <label style="width: 60%; font-weight:bold">Sub Caregory: </label>
              <select style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;" name="sub_category_id" id="sub_category_id" class="form-control">
                
              </select>
            </div>

            {{-- <div class="input-group mt-4">
              <label style="width: 60%; font-weight:bold">Service Status: </label>
              <select style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;" name="" id="" class="form-control">
                <option value="1">category_1</option>
                <option value="2">category_2</option>
              </select>
            </div> --}}

            <div class="input-group mt-4">
              <label style="width: 60%; font-weight:bold">Starts From: </label>
              <input style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;" name="price" id="" class="form-control" placeholder="00.00 $">
            </div>

            {{-- <div class="input-group mt-4">
              <label style="width: 60%; font-weight:bold">Model Name: </label>
              <input style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;" name="" id="" class="form-control" placeholder="Type here...">

            </div> --}}

            {{-- <div class="input-group mt-4">
              <label style="width: 60%; font-weight:bold">Color: </label>
              <input style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;" name="" id="" class="form-control" placeholder="Type here...">

            </div> --}}

            <label class="mt-4" style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Booking Link:</label>
            <input type="text" name="link" class="form-control" placeholder="Service Booking URL" style="border:unset; border-bottom: 2px solid black; font-size:17px;">

            <label class="mt-4" style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Booking Contact Number:</label>
            <input type="text" name="contact_number" class="form-control" placeholder="Service Booking Contact Number" style="border:unset; border-bottom: 2px solid black; font-size:17px;">
          
            <button type="submit"  class="btn btn-success mt-4 logout-profile"> Add Service</button>
          </form>
          </div>
      </div>
    </div>




</div>
    
@endsection


@section('js')
    <script>
      $('#category_id').on('click', function(){
        val = $('#category_id').val();

        $.ajax({
        url: "/vendor/service/get-service-sub-category/"+val,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            htmls = ``;

            res.forEach(element => {
                html = ` <option value="`+element.id+`">`+element.name+`</option>`;

                htmls += html;
            });

            $('#sub_category_id').html(htmls);
        }
    });
      })
    </script>
@endsection
