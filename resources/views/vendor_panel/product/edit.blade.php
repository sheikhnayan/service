
@extends('vendor_panel.layouts.main')

@section('title')
    Edit Product
@endsection

@section('content')

<div class="content-wrapper">
    <div class="content">
      <div class="row justify-content-center">
        <div class="col-md-3">
          <form action="{{ route('vendor.product.update',[$data->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="image" style="width: 100%;">
              <img class="img-fluid" src="{{ asset('storage/'.$data->image) }}" width="100%" height="122px">
              <img class="img-fluid" src="{{ asset('vendor_panel/edit_image.png') }}" style="position: absolute; top: 4px; right: 26px; cursor: pointer;">
            </label> 
            <br>
            <input type="file" name="image" id="image" style="display: none;">

            <label class="mt-4" style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Product Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $data->name }}" style="border:unset; border-bottom: 2px solid black; font-size:17px;">

            <label class="mt-4" style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Description:</label>
            <input type="text" name="description" class="form-control" value="{{ $data->description }}" style="border:unset; border-bottom: 2px solid black; font-size:17px;">
        
            <div class="input-group mt-4">
              <label style="width: 60%; font-weight:bold">Category: </label>
              @php
                  $category = DB::table('product_categories')->get();
              @endphp
              <select style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;"
                  name="category_id" id="category_id" class="form-control" required>
                  @foreach ($category as $item)
                      <option {{ $data->category_id == $item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach
              </select>
            </div>

            <div class="input-group mt-4">
              <label style="width: 60%; font-weight:bold">Sub Caregory: </label>
              @php
                  $sub_category = DB::table('product_sub_categories')->where('product_category_id',$data->category_id)->get();
              @endphp
              <select style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;" name="sub_category_id" id="" class="form-control">
                @foreach ($sub_category as $item)
                    <option {{ $data->sub_category_id == $item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="input-group mt-4">
              <label style="width: 60%; font-weight:bold">Product Status: </label>
              <select style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;" name="status" id="" class="form-control">
                <option {{ $data->status == '1' ? 'selected':'' }} value="1">Active</option>
                <option {{ $data->status == '0' ? 'selected':'' }} value="2">Inactive</option>
              </select>
            </div>

            <div class="input-group mt-4">
              <label style="width: 60%; font-weight:bold">Price: </label>
              <input style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;" name="price" value="{{ $data->price }}" class="form-control" placeholder="00.00 $">
            </div>

            <div class="input-group mt-4">
              <label style="width: 60%; font-weight:bold">Model Name: </label>
              <input style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;" name="model" value="{{ $data->model }}" class="form-control" placeholder="Type here...">

            </div>

            <div class="input-group mt-4">
              <label style="width: 60%; font-weight:bold">Color: </label>
              <input style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;" name="color" value="{{ $data->color }}" class="form-control" placeholder="Type here...">

            </div>

            <label class="mt-4" style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Product Link:</label>
            <input type="text" name="link" class="form-control" value="{{ $data->link }}" placeholder="Product Purchase URL" style="border:unset; border-bottom: 2px solid black; font-size:17px;">
          
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
        url: "/vendor/product/get-product-sub-category/"+val,
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
@endsection

