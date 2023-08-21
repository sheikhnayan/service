@extends('vendor_panel.layouts.main')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/css/intlTelInput.css">
    
@endsection

@section('title')
    Profile
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="{{ route('admin.user.update',[$data->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if ($data->type == 'vendor')      
                            <label for="image" style="width:100%; height:80px; border-radius: 22px; font-weight: 500; padding-top: 2rem;"
                            for="image" class="text-center bg-light" id="label">

                            @if ($data->vendor->logo == null)
                            <a class="btn btn-success text-light mb-1" style="border-radius: 50%" id="add_button">+</a>
                            {{-- Upload Logo --}}
                            <img id="imgPreview" class="img-fluid" style="height:80px !important; display:none" src="" width="100%">
                            <img class="img-fluid" src="{{ asset('vendor_panel/edit_image.png') }}" id="edit_button" style="position: absolute; top: 0px; right: 355px; cursor: pointer; display:none">
                            @else
                            <img id="imgPreview" class="img-fluid" style="height:80px !important;min-height:80px;" src="{{ asset('storage/'.$data->vendor->logo) }}" width="100%">
                            <img class="img-fluid" src="{{ asset('vendor_panel/edit_image.png') }}" style="position: absolute; top: 0px; right: 355px; cursor: pointer;">
                            @endif
                            </label> 
                            <br>
                            <input type="file" name="image" id="image" style="display: none;">
                            <p style="color: #000; padding-bottom: 1rem; font-size:12px;">Recommended Logo size 80 x 80 pixel</p> 
                        @endif

                        @if ($data->type == 'vendor')
                        <input type="text" name="company_name" placeholder="Company Name .." class="form-control mt-4" value="{{ $data->vendor->company_name }}" style="border:unset; border-bottom: 2px solid black; font-size:17px;" required>
                        @endif

                        <input type="text" placeholder="Founder Name.." name="name" class="form-control mt-4" value="{{ $data->name }}"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;" required>

                        @if ($data->type == 'vendor')
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    @php
                                        $country = DB::table('countries')->get();
                                    @endphp
                                    <select name="country_id" style="border-radius: 10px; background: #e0e0e0; font-weight: bold;" class="form-control mt-4" id="country_id" required>
                                      @foreach ($country as $item)
                                          <option {{ $data->vendor->country_id == $item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                      @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    @php
                                      $state = DB::table('states')->where('country_id',$data->vendor->country_id)->get();
                                    @endphp
                                    <select name="state_id" style="border-radius: 10px; background: #e0e0e0; font-weight: bold;" class="form-control mt-4" id="state_id">
                                      @foreach ($state as $item)
                                          <option {{ $data->vendor->state_id == $item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                      @endforeach
                                    </select>
                                </div>
                                {{-- @if ($data->vendor->business_type == 'non-profit')
                                    <div class="col-md-4">
                                        @php
                                            $npo = DB::table('n_p_o_categories')->get();
                                        @endphp
                                        <select style="background: #d9d9d9; border-radius: 15px;  font-weight: bold;" name="npo_category_id" class="form-control mt-4">
                                            @foreach ($npo as $item)
                                                <option {{ $data->npo_category_id == $item->id ? 'selected': ''}} value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif --}}
                            </div>
                            <br>
                            <br>

                            <input name="address" type="text" class="form-control" value="{{ $data->vendor->address }}" placeholder="Rocket Road, California, 1288"
                                style="border:unset; border-bottom: 2px solid black; font-size:17px;" required>

                        @endif

                        <div class="form-group col-12 col-sm-12 col-md-12 mt-4">
                          <div class="input-group input-group-sm">
                              <input value="{{ $data->phone }}" name="phone" id="phone" type="tel" placeholder="Phone NUmber" class="form-control form-control-sm rounded-0 w-100" style="border:unset; border-bottom: 2px solid black; font-size:17px;" required>
                              {{-- <div class="input-group-append">
                                  <span class="input-group-text rounded-0 fa fa-phone"></span>
                              </div> --}}
                          </div>
                      </div>

                        <input type="text" class="form-control mt-4" value="{{ $data->email }}" placeholder="Your Email"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;" required>

                        @if ($data->type == 'vendor')
                            
                            <input type="text" class="form-control mt-4" value="{{ $data->vendor->website }}" placeholder="Your Website URL"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;" required>
                            
                        @endif

                            <input type="password" name="password" class="form-control mt-4" placeholder="Change Password" 
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                        @if ($data->type == 'vendor')
                            
                            <select name="status" class="form-control mt-4" style="background: #d9d9d9; border-radius: 15px;  font-weight: bold;">
                                <option {{ $data->vendor->status == 0 ? 'selected': '' }} value="0">Inactive</option>
                                <option {{ $data->vendor->status == 1 ? 'selected': '' }} value="1">Active</option>
                            </select>
                            
                        @endif

                        <button type="submit" class="btn btn-success mt-4 logout-profile" style="background: #000"> Update</button>
                    </form>
                </div>
            </div>
        </div>




    </div>
@endsection


@section('js')
<script>
    $('#country_id').on('click', function(){
        val = $('#country_id').val();

        $.ajax({
        url: "/get-states/"+val,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            htmls = ``;

            res.forEach(element => {
                html = ` <option value="`+element.id+`">`+element.name+`</option>`;

                htmls += html;
            });

            $('#state_id').empty();

            $('#state_id').html(htmls);
        }
    });
    });
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/js/intlTelInput.min.js"></script>

<script>
  let telInput = $("#phone")

// initialize
telInput.intlTelInput({
initialCountry: 'auto',
preferredCountries: ['us','gb','br','ru','cn','es','it'],
autoPlaceholder: 'aggressive',
utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/js/utils.js",
geoIpLookup: function(callback) {
  fetch('https://ipinfo.io/json', {
      cache: 'reload'
  }).then(response => {
      if ( response.ok ) {
           return response.json()
      }
      throw new Error('Failed: ' + response.status)
  }).then(ipjson => {
      callback(ipjson.country)
  }).catch(e => {
      callback('us')
  })
}
})

let telInput2 = $("#phone2")

// initialize
telInput2.intlTelInput({
initialCountry: 'br',
preferredCountries: ['us','gb','br','ru','cn','es','it'],
autoPlaceholder: 'aggressive',
utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/js/utils.js"
})
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

                    $('#label').css('padding-top','0rem')

                };
                reader.readAsDataURL(file);


            }
        });
    });
  </script>
@endsection