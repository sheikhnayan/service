
@extends('vendor_panel.layouts.main')

@section('title')
    Edit Service
@endsection

@section('content')

<div class="content-wrapper">
    <div class="content">
      <div class="row justify-content-center">
        <div class="col-md-3">
          <form action="{{ route('vendor.service.update',[$data->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="image" style="width:100%; height:122px; border-radius: 22px; font-weight: 500; padding-top: 2rem;"
                            for="image" class="text-center bg-light">
                            @if (Auth::user()->vendor->logo == null)
                            <a class="btn btn-success text-light mb-1" style="border-radius: 50%">+</a> <br>
                            Upload Logo
                            @else
                            <img class="img-fluid" id="imgPreview" style="height: 122px !important" src="{{ asset('storage/' . $data->image) }}" width="100%">
                            <img class="img-fluid" src="{{ asset('vendor_panel/edit_image.png') }}" style="position: absolute; top: 4px; right: 26px; cursor: pointer;">
                            @endif
                            </label> 
            <br>
            <input type="file" name="image" id="image" style="display: none;">


            <label class="mt-4" style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Service Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $data->name }}" style="border:unset; border-bottom: 2px solid black; font-size:17px;">

            <label class="mt-4" style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Description:</label>
            <input type="text" name="description" class="form-control" value="{{ $data->description }}" style="border:unset; border-bottom: 2px solid black; font-size:17px;">
        
            <div class="input-group mt-4">
              <label style="width: 60%; font-weight:bold">Category: </label>
              @php
                  $category = DB::table('service_categories')->get();
              @endphp
              <select style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;"
                  name="category_id" id="category_id" class="form-control" required>
                  @foreach ($category as $item)
                      <option {{ $data->category_id == $item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach
              </select>
            </div>

            <div class="input-group mt-4">
              <label style="width: 60%; font-weight:bold">Sub Category: </label>
              @php
                  $sub_category = DB::table('service_sub_categories')->where('service_category_id',$data->category_id)->get();
              @endphp
              <select style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;" name="sub_category_id" id="" class="form-control">
                @foreach ($sub_category as $item)
                    <option {{ $data->sub_category_id == $item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
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
              <input style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;" name="price" value="{{ $data->price }}" class="form-control" placeholder="00.00 $">
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
            <input type="url" name="link" value="{{ $data->link }}" class="form-control" placeholder="Service Booking URL" style="border:unset; border-bottom: 2px solid black; font-size:17px;">

            <label class="mt-4" style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Booking Contact Number:</label>
            <input type="text" name="contact_number" value="{{ $data->contact_number }}" class="form-control" placeholder="Service Booking contact Number" style="border:unset; border-bottom: 2px solid black; font-size:17px;">
          
            <button type="submit"  class="btn btn-success mt-4 logout-profile"> Save</button>
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

            $('#sub_category_id').empty();
            $('#sub_category_id').html(htmls);
        }
    });
    });
</script>

<script>
  $(document).ready(() => {
      $("#image").change(function () {
          const file = this.files[0];
          if (file) {
              let reader = new FileReader();
              reader.onload = function (event) {
                  $("#imgPreview")
                  .attr("src", event.target.result);

                  $("#imgPreview")
                  .css("display", 'block');

                  $('#add_button').css('display','none')

                  $('#edit_button').css('display','block')
              };
              reader.readAsDataURL(file);


          }
      });
  });
</script>

@endsection


