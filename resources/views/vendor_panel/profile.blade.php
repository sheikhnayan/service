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
                    <form action="{{ route('profile-update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if (Auth::user()->type == 'vendor')   
                        <label for="image" style="width:80px; height:80px; border-radius: 22px; font-weight: 500; 
                            @if (Auth::user()->vendor->logo == null)
                            padding-top: 2rem;
                            @endif
                            "
                            for="image" class="bg-light">
                            @if (Auth::user()->vendor->logo == null)
                            <a class="btn btn-success text-light mb-1" style="border-radius: 50%">+</a> <br>
                             <span> Upload Logo</span>
                             <img class="img-fluid" id="imgPreview" style="height: 80px !important; display:none; min-height:80px;" src="{{ asset('storage/'.Auth::user()->vendor->logo) }}" width="100%">                           
                             <img class="img-fluid" src="{{ asset('vendor_panel/edit_image.png') }}" style="position: absolute; top: 0px; right: 355px; cursor: pointer; width:25px; display:none" id="edit_button">
                             @else
                             <img class="img-fluid" id="imgPreview" style="height: 80px !important; min-height:80px;" src="{{ asset('storage/'.Auth::user()->vendor->logo) }}" width="100%">
                             <img class="img-fluid" src="{{ asset('vendor_panel/edit_image.png') }}" style="position: absolute; top: 0px; right: 355px; width:25px; cursor: pointer;">
                             @endif
                            </label> 
                            <br>
                            <input type="file" name="image" id="image" style="display: none;">
                            <p style="color: #000; padding-bottom: 1rem; font-size:12px;">Recommended Logo size 80 x 80 pixel</p> 
                        @endif
                        @if (Auth::user()->type == 'vendor')    
                        
                            <input type="text" name="company_name" class="form-control mt-4" value="{{ Auth::user()->vendor->company_name }}"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;" placeholder="Company/NPO Name..." required>
                            <input type="text" name="founder_name" class="form-control mt-4" value="{{ Auth::user()->vendor->founder_name }}"
                                style="border:unset; border-bottom: 2px solid black; font-size:17px;" placeholder="Founder Name..." required>
                        @else
                        <input type="text" name="name" class="form-control mt-4" value="{{ Auth::user()->name }}"
                                style="border:unset; border-bottom: 2px solid black; font-size:17px;" required placeholder="Name...">
                        @endif
                        @if (Auth::user()->type == 'vendor')    

                            <div class="drops mt-4">
                              @php
                                  $country = DB::table('countries')->get();
                              @endphp
                              <select name="country_id" style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;" class="form-control float-left" id="country_id" required>
                                @foreach ($country as $item)
                                    <option {{ Auth::user()->vendor->country_id == $item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                              </select>
                              @php
                                $state = DB::table('states')->where('country_id',Auth::user()->vendor->country_id)->get();
                              @endphp
                              <select name="state_id" style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;" class="form-control float-right" id="state_id">
                                @foreach ($state as $item)
                                    <option {{ Auth::user()->vendor->state_id == $item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                              </select>
                            </div>
                            <br>
                            <br>
                        @endif
                        @if (Auth::user()->type == 'vendor')    

                        <input name="address" type="text" class="form-control mt-4" value="{{ Auth::user()->vendor->address }}" placeholder="Rocket Road, California, 1288"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;" required>
                        @endif
                        <div class="form-group col-12 col-sm-12 col-md-12 mt-4">
                          <div class="input-group input-group-sm">
                              <input value="{{ Auth::user()->phone }}" name="phone" id="phone" type="tel" placeholder="Phone NUmber" class="form-control form-control-sm rounded-0 w-100" style="border:unset; border-bottom: 2px solid black; font-size:17px;" required>
                              {{-- <div class="input-group-append">
                                  <span class="input-group-text rounded-0 fa fa-phone"></span>
                              </div> --}}
                          </div>
                      </div>

                        <input type="text" class="form-control mt-4" value="{{ Auth::user()->email }}" placeholder="Your Email"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;" required>
                        @if (Auth::user()->type == 'vendor')    

                            <input type="text" class="form-control mt-4" value="{{ Auth::user()->vendor->website }}" placeholder="Your Website URL (Must inc. https://)"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;" required>

                            @if (Auth::user()->vendor->business_type == 'non-profit')
                            <input type="text" name="donation_link" class="form-control mt-4" value="{{ Auth::user()->vendor->website }}" placeholder="Donation Link (Must inc. https://)"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;" required>
                            @endif

                        @endif
                            <input type="password" name="old_password" class="form-control mt-4" placeholder="Old Password"
                                style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                            <input type="password" name="password" class="form-control mt-4" placeholder="New Password"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                        <button type="submit" class="btn btn-success mt-4 logout-profile"> Update</button>
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

                    $("#imgPreview").prev()
                    .css("display", 'none');

                    $("Label")
                    .css("padding", '0px');

                    $("#imgPreview").prev()
                    .css("display", 'none');
                    $("#imgPreview").prev().prev()
                    .css("display", 'none');
                    $("#imgPreview").prev().prev().prev()
                    .css("display", 'none');

                    $('#add_button').css('display','none')

                    $('#edit_button').css('display','block')
                };
                reader.readAsDataURL(file);


            }
        });
    });
  </script>
@endsection