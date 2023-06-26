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
    <link href="{{ asset('vendor_panel/assets/img/favicon.png') }}" rel="shortcut icon" />
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



        <div class="page-wrapper" style="padding-left: 0px !important">
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

                    <div class="navbar-right ml-auto">
                        <a href="/vendor-login" class="btn btn-success" style="padding: 12px 25px;"> Vendor Login </a>
                    </div>
                </nav>


            </header>
            @if ($errors->any())
            @foreach ($errors->all() as $item)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong>Error !</strong> {{ $item }}
                </div>
            @endforeach
            @endif
            <div class="content-wrapper">
                <div class="content">
                  <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ route('register-user') }}" method="post">
                        @csrf
                            {{-- <img class="img-fluid" src="{{ asset('vendor_panel/user.png') }}" width="122px" height="122px"> --}}
                            <h4 class="ml-2 text-dark" style="font-family:Montserrat; font-weight:bold">Hey,</h4>
                            <h4 class="ml-2 text-dark" style="font-family:Montserrat; font-weight:bold;line-height:2.3;">Register as a User</h4>
            
                            <input type="text" name="name" class="form-control mt-4" placeholder="Name"  style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                            <input name="email" type="email" class="form-control mt-4" placeholder="Email Address"  style="border:unset; border-bottom: 2px solid black; font-size:17px;">
                        
                            <div class="form-group mt-4">
                                <div class="input-group input-group-sm">
                                    <input name="phone" id="phone" type="tel" placeholder="Phone NUmber" class="form-control form-control-sm rounded-0 w-100" style="border:unset; border-bottom: 2px solid black; font-size:17px; border-radius: 0.25rem !important;">
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <input type="password" name="password" class="form-control mt-4" placeholder="Password"
                                    style="border:unset; border-bottom: 2px solid black; font-size:17px; border-radius:0px;" id="id_password">
                                    <img id="togglePassword" class="img-fluid" src="{{ asset('vendor_panel/eye.png') }}" style="position: absolute; top: 290px; right: 20px; cursor:pointer">
                            </div>
                        
                            <div class="form-group">
                                <input type="password" name="password_confirmation" class="form-control mt-4" placeholder="Confirm Password"
                                    style="border:unset; border-bottom: 2px solid black; font-size:17px; border-radius:0px;" id="id_password2">
                                    <img id="togglePassword2" class="img-fluid" src="{{ asset('vendor_panel/eye.png') }}" style="position: absolute; top: 355px; right: 20px; cursor:pointer">
                            </div>
                            
                            <input required type="checkbox" id="checkbox" class="mt-4" placeholder="Confirm Password"  style="border:unset; border-bottom: 2px solid black; font-size:17px;">
                            <label for="checkbox">I agree with <a href="#">terms and condition</a> & <a href="#">privacy policy</a></label>

                            <br>

                            <input type="hidden" name="type" value="user">

                            <button type="Submit" class="btn btn-success mt-4 logout-profile"> Register </button>

                            <span class="mt-4" style="display: block; text-align:center;font-size:17px;">
                                Already have an account? <a style="color:#F98513;" href="/user-login">Login Now</a>
                            </span>
                        </form>
                      </div>
                  </div>
                </div>
            
            
            
            
            </div>


            
            {{-- <footer class="footer mt-auto">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                         <a href="/"><i class="mdi mdi-home"></i></a>
                         <a href="/"><i class="mdi mdi-bell-outline"></i></a>
                         <a href="/profile"><i class="mdi mdi-account-edit"></i></a>
                    </div>
                </div>
            </footer> --}}

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
    const togglePassword2 = document.querySelector('#togglePassword2');
    const password2 = document.querySelector('#id_password2');

    togglePassword2.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
        password2.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
</script>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#id_password');

    togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
</script>




</body>

</html>
