@extends('vendor_panel.layouts.main')

@section('title')
    Edit Event
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <form action="{{ route('vendor.event.update', [$data->id]) }}" method="post"
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
                            style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Event Name:</label>
                        <input name="name" type="text" class="form-control" value="{{ $data->name }}"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                        <label class="mt-4"
                            style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Description:</label>
                        <input name="description" type="text" class="form-control" value="{{ $data->description }}"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                        <div class="input-group mt-4">
                            <label
                                style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold; margin-top:0.5rem; margin-right: 1rem;">
                                Event Type: </label>
                            <input class="event_type" name="type" value="virtual" type="radio" id="virtual"
                                {{ $data->type == 'virtual' ? 'checked' : '' }}>
                            <label style="width: 20%; font-weight:bold; margin-left: 1rem; margin-top: .5rem;"
                                for="virtual">Virtual</label>
                            <input class="event_type" name="type" value="physical" type="radio" id="physical"
                                {{ $data->type == 'physical' ? 'checked' : '' }}>
                            <label style="width: 20%; font-weight:bold; margin-left: 1rem; margin-top: .5rem;"
                                for="physical">Physical</label>
                        </div>

                        <div class="input-group mt-4">
                            <label
                                style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold; margin-top:0.5rem; margin-right: 1rem;">
                                Date: </label>
                            <input name="date" type="date" value="{{ $data->date }}" class="form-control">
                        </div>

                        <label class="mt-4"
                            style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Event Registration Link:</label>
                        <input name="link" value="{{ $data->link }}" type="url" class="form-control"
                            placeholder="Event Link" style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                        <label class="mt-4"
                            style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Event
                            Location:</label>
                        <input name="location" id="location_place_holder" value="{{ $data->location }}" type="text" class="form-control"
                            placeholder="Ex: Zoom/Meet/Broadcast etc"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                        <button href="/" class="btn btn-success mt-4 logout-profile"> Save</button>
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

<script>
    $('.event_type').on('change', function(){

      value = $(this).val();

      console.log(value);

      if (value == 'physical') {
        
        $('#location_place_holder').attr('placeholder','Enter Google Location Link');

      } else {

        $('#location_place_holder').attr('placeholder','Ex: Zoom/Meet/Broadcast etc');
        
      }

    })
  </script>
@endsection
