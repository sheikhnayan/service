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

@section('head')
<style>
/* Variables */

#payment-form {
width: 100%;
min-width: 500px;
align-self: center;
box-shadow: 0px 0px 0px 0.5px rgba(50, 50, 93, 0.1),
0px 2px 5px 0px rgba(50, 50, 93, 0.1), 0px 1px 1.5px 0px rgba(0, 0, 0, 0.07);
border-radius: 7px;
padding: 40px;
}

.hidden {
display: none;
}

#payment-message {
color: rgb(105, 115, 134);
font-size: 16px;
line-height: 20px;
padding-top: 12px;
text-align: center;
}

#payment-element {
margin-bottom: 24px;
}

/* Buttons and links */
.button {
background: #5469d4;
font-family: Arial, sans-serif;
color: #ffffff;
border-radius: 4px;
border: 0;
padding: 12px 16px;
font-size: 16px;
font-weight: 600;
cursor: pointer;
display: block;
transition: all 0.2s ease;
box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
width: 100%;
}
button:hover {
filter: contrast(115%);
}
button:disabled {
opacity: 0.5;
cursor: default;
}

/* spinner/processing state, errors */
.spinner,
.spinner:before,
.spinner:after {
border-radius: 50%;
}
.spinner {
color: #ffffff;
font-size: 22px;
text-indent: -99999px;
margin: 0px auto;
position: relative;
width: 20px;
height: 20px;
box-shadow: inset 0 0 0 2px;
-webkit-transform: translateZ(0);
-ms-transform: translateZ(0);
transform: translateZ(0);
}
.spinner:before,
.spinner:after {
position: absolute;
content: "";
}
.spinner:before {
width: 10.4px;
height: 20.4px;
background: #5469d4;
border-radius: 20.4px 0 0 20.4px;
top: -0.2px;
left: -0.2px;
-webkit-transform-origin: 10.4px 10.2px;
transform-origin: 10.4px 10.2px;
-webkit-animation: loading 2s infinite ease 1.5s;
animation: loading 2s infinite ease 1.5s;
}
.spinner:after {
width: 10.4px;
height: 10.2px;
background: #5469d4;
border-radius: 0 10.2px 10.2px 0;
top: -0.1px;
left: 10.2px;
-webkit-transform-origin: 0px 10.2px;
transform-origin: 0px 10.2px;
-webkit-animation: loading 2s infinite ease;
animation: loading 2s infinite ease;
}

@-webkit-keyframes loading {
0% {
-webkit-transform: rotate(0deg);
transform: rotate(0deg);
}
100% {
-webkit-transform: rotate(360deg);
transform: rotate(360deg);
}
}
@keyframes loading {
0% {
-webkit-transform: rotate(0deg);
transform: rotate(0deg);
}
100% {
-webkit-transform: rotate(360deg);
transform: rotate(360deg);
}
}

@media only screen and (max-width: 600px) {
#payment-form  {
width: 80vw;
min-width: initial;
}
}
</style>
@endsection


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



        <div class="page-wrapper">
            <!-- Header -->
            <header class="main-header " id="header" style="padding: 0px">
                <nav class="navbar navbar-static-top navbar-expand-lg">
                    <!-- Sidebar toggle button -->
                    {{-- <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button> --}}

                    <div class="navbar-left ml-4">
                        <a href="/">
                            <img class="img-fluid" src="{{ asset('vendor_panel/logo.png') }}" alt="" width="92px" height="48px"
                                srcset="">
                        </a>
                    </div>
                </nav>


            </header>

                <div class="alert alert-danger alert-dismissible" style="display: none" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong></strong>
                </div>

            <div class="content-wrapper">
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card mt-4">

                <div class="card-header">

                    You will be charged ${{ number_format($plan->price, 2) }} for {{ $plan->name }} Plan after 3 months of trial for an year.

                </div>



                <div class="card-body">



                    <form id="payment-form" action="{{ route('subscription.create') }}" method="POST">

                        @csrf

                        <input type="hidden" name="plan" id="plan" value="{{ $plan->id }}">

                        <input type="hidden" name="platform" value="{{ $platform }}">



                        <div class="row">

                            <div class="col-xl-4 col-lg-4">

                                <div class="form-group">

                                    <label for="">Name</label>

                                    <input type="text" name="name" id="card-holder-name" class="form-control" value="" placeholder="Name on the card">

                                </div>

                            </div>

                        </div>



                        <div class="row">

                            <div class="col-xl-4 col-lg-4">

                                <div class="form-group">

                                    <label for="">Card details</label>

                                    <div id="card-element"></div>

                                </div>

                            </div>

                            <div class="col-xl-12 col-lg-12">

                            <hr>

                                <button type="submit" class="btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">Checkout Now</button>

                            </div>

                        </div>



                    </form>



                </div>

            </div>

        </div>

    </div>

</div>



<script src="https://js.stripe.com/v3/"></script>

<script>

    const stripe = Stripe('pk_test_51KFMekKLHmQr7DxLXJcXRxQrjLfnsaX7rrxu2D6nsFgKIndvC8Numb9BypVB4q4OrvVGhb59kYAsipP1smNsoLHz00mVDoIqWz')



    const elements = stripe.elements()

    const cardElement = elements.create('card')



    cardElement.mount('#card-element')



    const form = document.getElementById('payment-form')

    const cardBtn = document.getElementById('card-button')

    const cardHolderName = document.getElementById('card-holder-name')



    form.addEventListener('submit', async (e) => {

        e.preventDefault()



        cardBtn.disabled = true

        const { setupIntent, error } = await stripe.confirmCardSetup(

            cardBtn.dataset.secret, {

                payment_method: {

                    card: cardElement,

                    billing_details: {

                        name: cardHolderName.value

                    }

                }

            }

        )



        if(error) {

            cardBtn.disable = false

            error_message = error.message;

            $('.alert-dismissible').css('display','block');
            $('.alert-dismissible').append(error_message);



        } else {

            let token = document.createElement('input')

            token.setAttribute('type', 'hidden')

            token.setAttribute('name', 'token')

            token.setAttribute('value', setupIntent.payment_method)

            form.appendChild(token)

            form.submit();

        }

    })

</script>


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
preferredCountries: ['us', 'gb', 'br', 'ru', 'cn', 'es', 'it'],
autoPlaceholder: 'aggressive',
utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/js/utils.js",
geoIpLookup: function(callback) {
    fetch('https://ipinfo.io/json', {
        cache: 'reload'
    }).then(response => {
        if (response.ok) {
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
preferredCountries: ['us', 'gb', 'br', 'ru', 'cn', 'es', 'it'],
autoPlaceholder: 'aggressive',
utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/js/utils.js"
})
</script>




</body>

</html>
