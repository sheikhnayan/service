<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="_token" content="{{ csrf_token() }}">

    <title>@yield('title') - TBE</title>

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
                    
                    <div class="d-block">
                        <input style="float: left" type="text" name="address" id="search-input" class="form-control" placeholder="Search Store,Product, service, event, location..." value="{{ session()->get('address') }}" autocomplete="off" readonly>

                        <a style="float: right" href="#" onclick="change_address()">Change Address</a>
                    </div>

                    @else
                        <h4 class="ml-auto"> @yield('title') </h4>
                    @endif
                    @if (Auth::user()->type == 'vendor')

                    <div class="navbar-right ml-auto">
                        <img class="img-fluid" src="{{ asset('storage'.Auth::user()->vendor->logo) }}" style="border-radius: 50%; width: 50px; height: 50px"
                            srcset="">
                        <span class=" text-dark " style="font-weight:bold; font-size: 1rem">
                            {{ Auth::user()->vendor->company_name }}
                        </span>
                        <span class="mdi mdi-arrow-down-drop-circle drop-down"></span>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                            @if (Auth::user()->type == 'vendor')
                            <a class="dropdown-item" href="{{ route('notification') }}">Notification</a>
                            @else
                            <a class="dropdown-item" href="{{ route('user.wish') }}">WishList</a>
                            @endif
                            <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item" href="#">Logout</button>
                            </form>
                        </div>
                    </div>
                    

                    @endif

                    @if (Auth::user()->type == 'vendor' | Auth::user()->type == 'user')

                    <div class="navbar-right ml-auto">
                        <img class="img-fluid" src="{{ asset('storage'.Auth::user()->vendor->logo) }}" style="border-radius: 50%; width: 50px; height: 50px"
                            srcset="">
                        <span class=" text-dark " style="font-weight:bold; font-size: 1rem">
                            {{ Auth::user()->vendor->company_name }}
                        </span>
                        <span class="mdi mdi-arrow-down-drop-circle drop-down"></span>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                            @if (Auth::user()->type == 'vendor')
                            <a class="dropdown-item" href="{{ route('notification') }}">Notification</a>
                            @else
                            <a class="dropdown-item" href="{{ route('user.wish') }}">WishList</a>
                            @endif
                            <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item" href="#">Logout</button>
                            </form>
                        </div>
                    </div>
                    

                    @endif

                </nav>


            </header>
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible" style="width: 23rem; margin:auto; margin-top:1rem; margin-bottom: 1rem;" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong> {{ session('success') }} </strong>
                </div>
            @endif 

            @if(Session::has('failure'))
                <div class="alert alert-danger alert-dismissible" style="width: 23rem; margin:auto; margin-top:1rem; margin-bottom: 1rem;" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong> {{ session('failure') }} </strong>
                </div>
            @endif 

            @yield('content')


            @if (Auth::user()->type != 'admin')
                {{-- <footer class="footer mt-auto">
                    <div class="row justify-content-center">
                        <div class="col-md-12" style="position: fixed; bottom: 0; width: 100%; background: #f8f9ff; text-align:center">
                            @if (Auth::user()->type == 'vendor')
                            <a href="{{ route('vendor.dashboard') }}">
                                <svg class="{{ Request::routeIs('vendor.dashboard') ? 'active' : '' }}" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="460.298px" height="460.297px" viewBox="0 0 460.298 460.297" style="enable-background:new 0 0 460.298 460.297;" xml:space="preserve">
                                    <g>
                                        <g>
                                            <path d="M230.149,120.939L65.986,256.274c0,0.191-0.048,0.472-0.144,0.855c-0.094,0.38-0.144,0.656-0.144,0.852v137.041    c0,4.948,1.809,9.236,5.426,12.847c3.616,3.613,7.898,5.431,12.847,5.431h109.63V303.664h73.097v109.64h109.629    c4.948,0,9.236-1.814,12.847-5.435c3.617-3.607,5.432-7.898,5.432-12.847V257.981c0-0.76-0.104-1.334-0.288-1.707L230.149,120.939    z"/>
                                            <path d="M457.122,225.438L394.6,173.476V56.989c0-2.663-0.856-4.853-2.574-6.567c-1.704-1.712-3.894-2.568-6.563-2.568h-54.816    c-2.666,0-4.855,0.856-6.57,2.568c-1.711,1.714-2.566,3.905-2.566,6.567v55.673l-69.662-58.245    c-6.084-4.949-13.318-7.423-21.694-7.423c-8.375,0-15.608,2.474-21.698,7.423L3.172,225.438c-1.903,1.52-2.946,3.566-3.14,6.136    c-0.193,2.568,0.472,4.811,1.997,6.713l17.701,21.128c1.525,1.712,3.521,2.759,5.996,3.142c2.285,0.192,4.57-0.476,6.855-1.998    L230.149,95.817l197.57,164.741c1.526,1.328,3.521,1.991,5.996,1.991h0.858c2.471-0.376,4.463-1.43,5.996-3.138l17.703-21.125    c1.522-1.906,2.189-4.145,1.991-6.716C460.068,229.007,459.021,226.961,457.122,225.438z"/>
                                        </g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    </svg>
                            </a>
                            <a href="/notification">
                                <svg class="{{ Request::routeIs('notification') ? 'active' : '' }}"  id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m391 0c-66.167 0-120 53.833-120 120s53.833 120 120 120 121-53.833 121-120-54.833-120-121-120zm0 187.5c-8.284 0-15-6.716-15-15 0-8.286 6.716-15 15-15s15 6.714 15 15c0 8.284-6.716 15-15 15zm15-60c0 8.291-6.709 15-15 15s-15-6.709-15-15v-60c0-8.291 6.709-15 15-15s15 6.709 15 15z"/><path d="m15 452h361c8.291 0 15-6.709 15-15s-6.709-15-15-15c-24.814 0-45-20.186-45-45v-119.715c-50.354-22.103-85.811-71.122-89.134-128.723-2.159-.786-4.482-1.179-6.683-1.875 3.592-6.462 5.817-13.784 5.817-21.687 0-24.814-20.186-45-45-45s-45 20.186-45 45c0 7.831 2.19 15.09 5.722 21.511-55.21 16.941-95.722 67.799-95.722 128.489v122c0 24.814-21.186 45-46 45-8.291 0-15 6.709-15 15s6.709 15 15 15zm166-347c0-8.276 6.724-15 15-15s15 6.724 15 15-6.724 15-15 15-15-6.724-15-15z"/><path d="m238.237 482h-84.474c6.213 17.422 22.707 30 42.237 30s36.024-12.578 42.237-30z"/></svg>
                            </a>
                            @else
                            <a href="{{ route('user.index') }}">
                                <svg class="{{ Request::routeIs('user.index') ? 'active' : '' }}" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="460.298px" height="460.297px" viewBox="0 0 460.298 460.297" style="enable-background:new 0 0 460.298 460.297;" xml:space="preserve">
                                    <g>
                                        <g>
                                            <path d="M230.149,120.939L65.986,256.274c0,0.191-0.048,0.472-0.144,0.855c-0.094,0.38-0.144,0.656-0.144,0.852v137.041    c0,4.948,1.809,9.236,5.426,12.847c3.616,3.613,7.898,5.431,12.847,5.431h109.63V303.664h73.097v109.64h109.629    c4.948,0,9.236-1.814,12.847-5.435c3.617-3.607,5.432-7.898,5.432-12.847V257.981c0-0.76-0.104-1.334-0.288-1.707L230.149,120.939    z"/>
                                            <path d="M457.122,225.438L394.6,173.476V56.989c0-2.663-0.856-4.853-2.574-6.567c-1.704-1.712-3.894-2.568-6.563-2.568h-54.816    c-2.666,0-4.855,0.856-6.57,2.568c-1.711,1.714-2.566,3.905-2.566,6.567v55.673l-69.662-58.245    c-6.084-4.949-13.318-7.423-21.694-7.423c-8.375,0-15.608,2.474-21.698,7.423L3.172,225.438c-1.903,1.52-2.946,3.566-3.14,6.136    c-0.193,2.568,0.472,4.811,1.997,6.713l17.701,21.128c1.525,1.712,3.521,2.759,5.996,3.142c2.285,0.192,4.57-0.476,6.855-1.998    L230.149,95.817l197.57,164.741c1.526,1.328,3.521,1.991,5.996,1.991h0.858c2.471-0.376,4.463-1.43,5.996-3.138l17.703-21.125    c1.522-1.906,2.189-4.145,1.991-6.716C460.068,229.007,459.021,226.961,457.122,225.438z"/>
                                        </g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    </svg>
                            </a>
                            <a href="{{ route('user.wish') }}">
                                <svg class="{{ Request::routeIs('user.wish') ? 'active' : '' }}" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="511.626px" height="511.627px" viewBox="0 0 511.626 511.627" style="enable-background:new 0 0 511.626 511.627;" xml:space="preserve">
                                    <g>
                                        <path d="M475.366,71.951c-24.175-23.606-57.575-35.404-100.215-35.404c-11.8,0-23.843,2.046-36.117,6.136   c-12.279,4.093-23.702,9.615-34.256,16.562c-10.568,6.945-19.65,13.467-27.269,19.556c-7.61,6.091-14.845,12.564-21.696,19.414   c-6.854-6.85-14.087-13.323-21.698-19.414c-7.616-6.089-16.702-12.607-27.268-19.556c-10.564-6.95-21.985-12.468-34.261-16.562   c-12.275-4.089-24.316-6.136-36.116-6.136c-42.637,0-76.039,11.801-100.211,35.404C12.087,95.552,0,128.288,0,170.162   c0,12.753,2.24,25.889,6.711,39.398c4.471,13.514,9.566,25.031,15.275,34.546c5.708,9.514,12.181,18.796,19.414,27.837   c7.233,9.042,12.519,15.27,15.846,18.699c3.33,3.422,5.948,5.899,7.851,7.419L243.25,469.937c3.427,3.429,7.614,5.144,12.562,5.144   s9.138-1.715,12.563-5.137l177.87-171.307c43.588-43.583,65.38-86.41,65.38-128.475C511.626,128.288,499.537,95.552,475.366,71.951   z"/>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    </svg></a>
                            @endif
                            <a href="/profile"><svg class="{{ Request::routeIs('profile') ? 'active' : '' }}" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                                <g id="user">
                                    <g>
                                        <path d="M256.167,277.721c-55.4,0-100.471-45.071-100.471-100.471S200.767,76.779,256.167,76.779    c55.4,0,100.471,45.071,100.471,100.471S311.567,277.721,256.167,277.721z"/>
                                    </g>
                                    <g>
                                        <path d="M437.19,74.98C388.83,26.63,324.55,0,256.17,0S123.5,26.63,75.15,74.98S0.17,187.62,0.17,256S26.8,388.67,75.15,437.02    C123.5,485.37,187.79,512,256.17,512s132.66-26.63,181.021-74.98C485.54,388.67,512.17,324.38,512.17,256    S485.54,123.33,437.19,74.98z M69.31,399.37C38.75,359.63,20.55,309.9,20.55,256c0-129.92,105.7-235.62,235.62-235.62    S491.78,126.08,491.78,256c0,53.92-18.2,103.67-48.79,143.42c-7.58-25.359-26.88-48-56.183-65.311    c-35.407-20.92-82.02-32.439-131.24-32.439c-49.16,0-95.57,11.521-130.68,32.46C95.91,351.41,76.82,374.01,69.31,399.37z"/>
                                    </g>
                                </g>
                                </svg></a>
                        </div>
                    </div>
                </footer> --}}
            @endif
        </div>
    </div>


    <div class="modal" id="address" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Change Address</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <label>Address</label>
                <input type="text" class="form-control map-input" id="address-input" value="{{ session()->get('address') }}" name="address" placeholder="Area/Road No/House/Apartment etc" style="font-size:17px;">

                <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
                <input type="hidden" name="address_longitude" id="address-longitude" value="0" />

                <div id="address-map-container" style="width:100%;height:400px; margin-top:4rem">
                    <div style="width: 100%; height: 100%" id="address-map"></div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Save changes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBI-epa4CpMbOcleXhSvoTgED2Np1twZJQ&libraries=places&callback=initialize" async defer></script>
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
    <script src="{{ asset('vendor_panel/assets/js/custom.js') }}"></script>
    <script src="{{ asset('js/mapInputChange.js') }}"></script>

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
    @if (Auth::user()->type == 'user')

    @if(session()->has('lng'))
    <input type="hidden" id="lng" value="{{ session()->get('lng') }}">
    <input type="hidden" id="lat" value="{{ session()->get('lat') }}">

        <script>
            lng = $('#lng').val();
            lat = $('#lat').val();
            console.log(lng);
            console.log(lat);
        </script>

    @else 
        <script src="{{ asset('js/mapInput.js') }}"></script>
    @endif

    <script>
        function change_address(){
            $('#address').modal('show');
        }
    </script>
    @endif

    <script>
        $('.drop-down').on('click', function(){
            $('.dropdown-menu').toggle();
        })
    </script>

    @yield('js')

    




</body>

</html>
