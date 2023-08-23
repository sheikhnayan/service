<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Transcending Black Excellence</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500"
        rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('vendor_panel/assets/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor_panel/assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor_panel/assets/plugins/flag-icons/css/flag-icon.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor_panel/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor_panel/assets/plugins/ladda/ladda.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor_panel/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor_panel/assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />

    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="{{ asset('vendor_panel/assets/css/sleek.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor_panel/assets/css/custom.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/css/intlTelInput.css">


    <!-- FAVICON -->
    <link href="{{ asset('vendor_panel/fav.png') }}" rel="shortcut icon" />
    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="{{ asset('vendor_panel/assets/plugins/nprogress/nprogress.js') }}"></script>
    <script src="https://kit.fontawesome.com/efec89e16a.js" crossorigin="anonymous"></script>
</head>


<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">

        {{-- @include('vendor_panel.layouts.nav') --}}



        <div class="page-wrapper" style="padding-left: unset">
            <!-- Header -->
            <header class="main-header " id="header" style="padding: 0px">
                <nav class="navbar navbar-static-top navbar-expand-lg">
                    <!-- Sidebar toggle button -->
                    {{-- <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button> --}}

                    <div class="navbar-left ml-4">
                        <img class="img-fluid" src="{{ asset('vendor_panel/logo.png') }}" alt="" width="92px" height="48px"
                            srcset="">
                    </div>
                </nav>


            </header>
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible" style="width: 23rem; text-align:center; margin:auto; margin-top:1rem; margin-bottom: 1rem;" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="fa fa-times"></i>
                </button>
                <strong> {{ session('success') }} </strong>
            </div>
        @endif 

        @if(Session::has('failure'))
            <div class="alert alert-danger alert-dismissible" style="width: 23rem; text-align:center; margin:auto; margin-top:1rem; margin-bottom: 1rem;" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="fa fa-times"></i>
                </button>
                <strong> {{ session('failure') }} </strong>
            </div>
        @endif 
        @if ($errors->any())
        @foreach ($errors->all() as $item)
            <div class="alert alert-danger alert-dismissible" style="width: 23rem; text-align:center; margin:auto; margin-top:1rem; margin-bottom: 1rem;" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="fa fa-times"></i>
                </button>
                <strong> {{ $item }} </strong>
            </div>
        @endforeach
        @endif
            <div class="content-wrapper">
                <div class="content">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form action="{{ route('final-registration') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h3 style="padding: 2rem 0rem; color:black">Final Step - we’re almost done!</h3>

                                <label for="image" style="width:80px; height:80px; border-radius: 22px; font-weight: 500; display:block;padding-top: 1rem; text-align: center"for="image" class="bg-light">
                                <a class="btn btn-success text-light mb-1" id="add_button" style="border-radius: 50%; margin-top: 5px;">+</a> <br>
                                <span style="font-size: 13px; margin-top: 20px; display: block;"> Upload Logo</span>
                                <img class="img-fluid" id="imgPreview" style="height: 80px !important; display:none; min-height:80px;" src="" width="100%">                           
                                <img class="img-fluid" src="{{ asset('vendor_panel/edit_image.png') }}" style="position: absolute; top: 95px;
                                left: 68px; cursor: pointer; width:25px; display:none" id="edit_button">

                                </label> 
                                <br>
                                <input type="file" name="image" id="image" style="display: none;" required>
                                <p style="color: #000; padding-bottom: 1rem; font-size:12px; text-align:left; padding-top: 0.5rem;">Recommended Logo size 80 x 80 pixel</p> 

                                <input type="text" class="form-control" name="founder_name" placeholder="Founder/Owner/Manager Name" style="border:unset; border-bottom: 2px solid black; font-size:17px;">
                                <input type="url" class="form-control mt-4" name="website" placeholder="Your Website URL" style="border:unset; border-bottom: 2px solid black; font-size:17px;">
                                <div class="row">
                                    <div class="col-md-6">
                                        @php
                                            $country = DB::table('countries')->get();
                                        @endphp
                                        <select style="background: #d9d9d9; border-radius: 15px;" name="country_id" id="country_id" class="form-control mt-4">
                                            <option selected disabled value="">Select a Country</option>
                                            @foreach ($country as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select style="background: #d9d9d9; border-radius: 15px;" name="state_id" id="state_id" class="form-control mt-4">
                                            <option selected disabled value="">State/Region</option>
                                        </select>
                                    </div>
                                    {{-- @if (Auth::user()->vendor->business_type == 'non-profit')
                                    <div class="col-md-4">
                                        @php
                                            $npo = DB::table('n_p_o_categories')->get();
                                        @endphp
                                        <select style="background: #d9d9d9; border-radius: 15px;" name="npo_category_id" class="form-control mt-4">
                                            @foreach ($npo as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif --}}
                                </div>


                                <input type="text" class="form-control" name="address" placeholder="Area/Road No/House/Apartment etc" style=" margin-top: 6rem; border:unset; border-bottom: 2px solid black; font-size:17px;">

                                <p style="padding: 2rem 0rem; color:black">Upload Your NPO/Business Incorporation/Registration document </p>
                                <br>
                                <input type="file" required width="100%" height="122px" name="logo[]" class="form-control mb-4" style="border:unset; border-bottom: 2px solid black; font-size:17px; padding-bottom:2.7rem;" multiple>
                                
                                <button type="submit" class="ml-auto mr-auto mb-4 mt-4 btn btn-success" style="width: 40%;">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
    <script src="{{ asset('vendor_panel/assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor_panel/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor_panel/assets/plugins/toaster/toastr.min.js') }}"></script>
    <script src="{{ asset('vendor_panel/assets/plugins/slimscrollbar/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('vendor_panel/assets/plugins/charts/Chart.min.js') }}"></script>
    <script src="{{ asset('vendor_panel/assets/plugins/ladda/spin.min.js') }}"></script>
    <script src="{{ asset('vendor_panel/assets/plugins/ladda/ladda.min.js') }}"></script>
    <script src="{{ asset('vendor_panel/assets/plugins/jquery-mask-input/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('vendor_panel/assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('vendor_panel/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('vendor_panel/assets/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
    <script src="{{ asset('vendor_panel/assets/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('vendor_panel/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('vendor_panel/assets/plugins/jekyll-search.min.js') }}"></script>
    <script src="{{ asset('vendor_panel/assets/js/sleek.js') }}"></script>
    <script src="{{ asset('vendor_panel/assets/js/chart.js') }}"></script>
    <script src="{{ asset('vendor_panel/assets/js/date-range.js') }}"></script>
    <script src="{{ asset('vendor_panel/assets/js/map.js') }}"></script>
    <script src="{{ asset('vendor_panel/assets/js/custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/js/intlTelInput.min.js"></script>

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

                    $('#add_button').next().css('display','none')

                    $("Label").css("padding", '0px');

                    $('#add_button').next().next().css('display','none')

                    $('#edit_button').css('display','block')
                };
                reader.readAsDataURL(file);


            }
        });
    });
  </script>




</body>

</html>
