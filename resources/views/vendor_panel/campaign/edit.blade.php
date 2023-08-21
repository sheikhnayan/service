@extends('vendor_panel.layouts.main')

@section('title')
    Edit Campaign
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <form action="{{ route('vendor.campaign.update', [$data->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        {{-- <label for="image" style="width: 100%;">
                            <img class="img-fluid" src="{{ asset('storage/' . $data->image) }}" width="100%" height="122px">
                            <img class="img-fluid" src="{{ asset('vendor_panel/edit_image.png') }}" style="position: absolute; top: 4px; right: 26px; cursor: pointer;">
                        </label> --}}
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
                        <p style="color: #000; padding-bottom: 1rem; font-size:12px; text-align:left;">Recommended Banner Size 300x150 Pixel</p> 
                        


                        <label class="mt-4"
                            style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Campaign
                            Name:</label>
                        <input name="name" type="text" class="form-control" value="{{ $data->name }}"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                        <label class="mt-4"
                            style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Description:</label>
                        <input name="description" type="text" class="form-control" value="{{ $data->description }}"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                        <label class="mt-4"
                            style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Campaign
                            Location:</label>
                        <input name="location" value="{{ $data->location }}" type="text" class="form-control"
                            placeholder="Your Campaign Location"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                        <input name="contact_number" value="{{ $data->contact_number }}" type="text" class="form-control mt-4"
                            placeholder="Contact Number (ex: +88-0189..)" style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                            <input name="link" value="{{ $data->link }}" type="url" class="form-control mt-4"
                            placeholder="Donation Links ex: Paypal.com/donate" style="border:unset; border-bottom: 2px solid black; font-size:17px;">


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
@endsection