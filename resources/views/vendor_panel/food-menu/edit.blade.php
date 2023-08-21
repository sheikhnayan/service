@extends('vendor_panel.layouts.main')

@section('title')
    Edit Food
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <form action="{{ route('vendor.food-menu.update', [$data->id]) }}" method="post"
                        enctype="multipart/form-data">
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
                        <p style="color: #000; padding-bottom: 1rem; font-size:12px; text-align:left; padding-top: 0.5rem;">Recommended Banner Size 300x150 Pixel</p> 


                        <label class="mt-4"
                            style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Product
                            Name:</label>
                        <input type="text" name="name" class="form-control" value="{{ $data->name }}"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                        <label class="mt-4"
                            style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Description:</label>
                        <input type="text" name="description" class="form-control" value="{{ $data->description }}"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                        <div class="input-group mt-4">
                            <label style="width: 60%; font-weight:bold">Caregory: </label>
                            @php
                                $category = DB::table('food_menu_categories')->get();
                            @endphp
                            <select style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;"
                                name="category_id" id="category_id" class="form-control" required>
                                @foreach ($category as $item)
                                    <option {{ $data->category_id == $item->id ? 'selected' : '' }}
                                        value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group mt-4">
                            <label style="width: 60%; font-weight:bold">Price: </label>
                            <input style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;"
                                name="price" value="{{ $data->price }}" class="form-control" placeholder="00.00 $">
                        </div>

                        <label class="mt-4"
                            style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Product
                            Link:</label>
                        <input type="url" name="link" value="{{ $data->link }}" class="form-control"
                            placeholder="Product Purchase URL"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                        <button type="submit" class="btn btn-success mt-4 logout-profile"> Save</button>
                    </form>
                </div>
            </div>
        </div>




    </div>
@endsection

@section('js')
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
