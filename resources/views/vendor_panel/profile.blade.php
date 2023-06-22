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
                        <label for="image" style="width:100%; height:122px; border-radius: 22px; font-weight: 500; padding-top: 2rem;"
                        for="image" class="text-center bg-light">
                          @if (Auth::user()->vendor->logo == null)
                          <a class="btn btn-success text-light mb-1" style="border-radius: 50%">+</a> <br>
                          Upload Logo
                          @else
                          <img src="{{ asset('storage/'.Auth::user()->vendor->logo) }}" width="100%" height="122px">
                          @endif
                        </label> 
                        <br>
                        <input type="file" name="image" id="image" style="display: none;">

                        <input type="text" name="company_name" class="form-control mt-4" value="{{ Auth::user()->vendor->company_name }}"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                        <input type="text" name="name" class="form-control mt-4" value="{{ Auth::user()->name }}"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                            <div class="drops mt-4">
                              @php
                                  $country = DB::table('countries')->get();
                              @endphp
                              <select name="country_id" style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;" class="form-control float-left" id="country_id">
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

                        <input name="address" type="text" class="form-control" value="{{ Auth::user()->vendor->address }}" placeholder="Rocket Road, California, 1288"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;">
                        <input type="text" class="form-control" value="North Carolina museum od art"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                        <div class="form-group col-12 col-sm-12 col-md-12 mt-4">
                          <div class="input-group input-group-sm">
                              <input value="{{ Auth::user()->phone }}" name="phone" id="phone" type="tel" placeholder="Phone NUmber" class="form-control form-control-sm rounded-0 w-100" style="border:unset; border-bottom: 2px solid black; font-size:17px;">
                              {{-- <div class="input-group-append">
                                  <span class="input-group-text rounded-0 fa fa-phone"></span>
                              </div> --}}
                          </div>
                      </div>

                        <input type="text" class="form-control mt-4" value="{{ Auth::user()->email }}" placeholder="Your Email"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                            <input type="text" class="form-control mt-4" value="{{ Auth::user()->vendor->website }}" placeholder="Your Website URL"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                            <input type="text" name="password" class="form-control mt-4" placeholder="Change Password"
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
@endsection