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

                    <div class="navbar-left ml-6">
                        <img class="img-fluid" src="{{ asset('vendor_panel/logo.png') }}" alt="" width="92px" height="48px"
                            srcset="">
                    </div>
                </nav>


            </header>

            <div class="content-wrapper">
                <div class="content">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card" style="border-radius: 8px; background: #f8f9ff">
                                {{-- <p style="text-align: center; padding: 3rem; color:black">Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. </p> --}}

                                <h3 style="padding: 2rem 3rem; color:black">Standard NPO Listing</h3>

                                <p style="padding: 0rem 3rem; color:#f98513">139$ <span style="color: #000">
                                        / Year</span></p>

                                <ul style="padding: 2rem 3rem; color:black">
                                    <li style="margin-bottom: 0.7rem; font-size: 18px"> <span style="color: green; font-size: 23px;" class="mdi mdi-check"></span> You can list your NPO Profile</li>
                                    <li style="margin-bottom: 0.7rem; font-size: 18px"> <span style="color: green; font-size: 23px;" class="mdi mdi-check"></span> List Campaigns</li>
                                    <li style="margin-bottom: 0.7rem; font-size: 18px"> <span style="color: green; font-size: 23px;" class="mdi mdi-check"></span> List Events</li>
                                    <li style="margin-bottom: 0.7rem; font-size: 18px"> <span style="color: green; font-size: 23px;" class="mdi mdi-check"></span> Add/Connect website </li>
                                    <li style="margin-bottom: 0.7rem; font-size: 18px"> <span style="color: green; font-size: 23px;" class="mdi mdi-check"></span> Add/Connect donation page</li>
                                    <li style="margin-bottom: 0.7rem; font-size: 18px"> <span style="color: green; font-size: 23px;" class="mdi mdi-check"></span> Visibility in both Android & IOS App</li>
                                </ul>

                                <span
                                    style="display: block; width: 90%; height: 2px; background: #181818; margin: auto;"></span>

                                <p style="padding: 2rem 3.5rem; color:#000">90 day’s investment in to business and if
                                    the business doesn’t cancel prior to the 90 Day then they will be charged the one
                                    year subscription without refund.</p>

                                <a class="btn btn-success" href="/plan/4/1"
                                    style="margin: auto; width: 15rem; margin-top: 2rem; margin-bottom: 2rem; border-radius: 10px; padding: 15px 10px;">
                                    Subscribe </a>

                                {{-- <a href="#" class="ml-auto mr-auto mb-4 text-dark display-7">Terms of services and privacy policy</a> --}}
                            </div>
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
        $('.platform').on('click', function(){
            val = $(this).val();

            plan = $(this).data('id');

            change = `/plan/`+plan+`/`+val;

            a = $(this).parent().parent().parent().find('a').attr('href',change);
            
            console.log(a);
        })
    </script>




</body>

</html>
