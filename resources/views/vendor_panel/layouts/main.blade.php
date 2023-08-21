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



    <!-- FAVICON -->
    <link href="{{ asset('vendor_panel/fav.png') }}" rel="shortcut icon" />
    @yield('head')
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

        @if (Auth::user()->type == 'admin')
        
        @include('vendor_panel.layouts.nav-admin')

        @elseif (Auth::user()->type == 'user')
            
        @include('vendor_panel.layouts.nav-user')

        @else
        
        @include('vendor_panel.layouts.nav-vendor')
            
        @endif



        <div class="page-wrapper">
            <!-- Header -->
            <header class="main-header " id="header">
                <nav class="navbar navbar-static-top navbar-expand-lg">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                    @if (Auth::user()->type == 'user')
                    <div class="search-form d-none d-lg-inline-block m-auto">
                        <div class="input-group" style="border: 1px solid #B9B9B9; border-radius: 15px;">
                            <input type="text" name="query" id="search-input" class="form-control" placeholder="Search Store,Product, service, event, location..." autofocus="" autocomplete="off">
                            <button type="button" name="search" id="search-btn" class="btn btn-flat">
                            <i class="mdi mdi-magnify"></i>
                            </button>
                        </div>
                        <div id="search-results-container">
                            <div id="search-results" style="display: block"></div>
                        </div>
                    </div>
                    @else
                        <h4 class="ml-auto"> @yield('title') </h4>
                    @endif

                    <div class="navbar-right ml-auto">
                        <img class="img-fluid" src="{{ asset('vendor_panel/logo.png') }}" alt="" width="92px" height="48px"
                            srcset="">
                    </div>
                </nav>


            </header>
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible" style="width: 23rem; margin:auto; margin-top:1rem;" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong>Success !</strong> {{ session('success') }}
                </div>
            @endif 

            @if(Session::has('failure'))
                <div class="alert alert-danger alert-dismissible" style="width: 23rem; margin:auto; margin-top:1rem;" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong>Error !</strong> {{ session('failure') }}
                </div>
            @endif 

            @yield('content')


            @if (Auth::user()->type != 'admin')
                <footer class="footer mt-auto">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            @if (Auth::user()->type == 'vendor')
                            <a href="{{ route('vendor.analytics') }}"><i class="mdi mdi-home"></i></a>
                            <a href="/notification"><i class="mdi mdi-bell-outline"></i></a>
                            @else
                            <a href="{{ route('user.index') }}"><i class="mdi mdi-home"></i></a>
                            <a href="{{ route('user.wish') }}"><i class="mdi mdi-heart-outline"></i></a>
                            @endif
                            <a href="/profile"><i class="mdi mdi-account-edit"></i></a>
                        </div>
                    </div>
                </footer>
            @endif
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

    <input type="hidden" id="auth_country_id" value="{{ Auth::user()->country_id }}">

    <script>
        $('#search-input').on('keyup', function(){

            $('#search-results').empty();

            country_id = $('#auth_country_id').val();

            value = $('#search-input').val();
            
            $.ajax({
                url: "/user/search-main/"+value,
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    
                    result = `<div class="row justify-content-center">
                                <div class="col-12 col-md-12">
                                    <h6 class="p-2" style="text-weight: bold; background: #eee;"> Products <h6>
                                </div>
                            </div>`;

                    res.product.forEach(element => {
                        if (element.vendor.vendor.country_id == country_id) {
                            
                            html = `<a href="/user/product/product/`+element.id+`">
                                        <div class="row p-2">
                                            <div class="col-3 col-md-3">
                                                <img class="img-fluid" src="http://127.0.0.1:8000/storage`+element.image+`" width="50px">
                                            </div>
                                            <div class="col-9 col-md-9" style="text-align: left">
                                                `+element.name+`
                                            </div>
                                        </div>
                                    </a>`;
    
                            result += html;
                            
                        }
                    });

                    result += `<div class="row justify-content-center">
                                <div class="col-12 col-md-12">
                                    <h6 class="p-2" style="text-weight: bold; background: #eee;"> Services <h6>
                                </div>
                            </div>`;

                    res.service.forEach(element => {

                        if (element.vendor.vendor.country_id == country_id) {
                            
                            html = `<a href="/user/service/service/`+element.id+`">
                                        <div class="row p-2">
                                            <div class="col-3 col-md-3">
                                                <img class="img-fluid" src="http://127.0.0.1:8000/storage`+element.image+`" width="50px">
                                            </div>
                                            <div class="col-9 col-md-9" style="text-align: left">
                                                `+element.name+`
                                            </div>
                                        </div>
                                    </a>`;
    
                            result += html;
                            
                        }

                    });

                    result += `<div class="row justify-content-center">
                                <div class="col-12 col-md-12">
                                    <h6 class="p-2" style="text-weight: bold; background: #eee;"> Food <h6>
                                </div>
                            </div>`;

                    res.food.forEach(element => {

                        if (element.vendor.vendor.country_id == country_id) {
                            
                            html = `<a href="/user/food/food/`+element.id+`">
                                        <div class="row p-2">
                                            <div class="col-3 col-md-3">
                                                <img class="img-fluid" src="http://127.0.0.1:8000/storage`+element.image+`" width="50px">
                                            </div>
                                            <div class="col-9 col-md-9" style="text-align: left">
                                                `+element.name+`
                                            </div>
                                        </div>
                                    </a>`;
    
                            result += html;
                            
                        }


                    });

                    result += `<div class="row justify-content-center">
                                <div class="col-12 col-md-12">
                                    <h6 class="p-2" style="text-weight: bold; background: #eee;"> Event <h6>
                                </div>
                            </div>`;

                    res.service.forEach(element => {

                        if (element.vendor.vendor.country_id == country_id) {
                            
                            html = `<a href="/user/event/event/`+element.id+`">
                                        <div class="row p-2">
                                            <div class="col-3 col-md-3">
                                                <img class="img-fluid" src="http://127.0.0.1:8000/storage`+element.image+`" width="50px">
                                            </div>
                                            <div class="col-9 col-md-9" style="text-align: left">
                                                `+element.name+`
                                            </div>
                                        </div>
                                    </a>`;
    
                            result += html;
                            
                        }


                    });

                    $('#search-results').html(result);
                }
            });
        })
    </script>

    <script>
        window.addEventListener('click', function(e){   
            if (document.getElementById('search-results').contains(e.target)){
                // Clicked in box
            } else{
                // Clicked outside the box
                if ($('#search-results').css('display') == 'block') {     
                    $('#search-results').hide();
                } else {
                    $('#search-results').show();
                    
                }
            }
        });
    </script>

    @yield('js')




</body>

</html>
