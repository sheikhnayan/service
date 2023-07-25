<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

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
  <input type="hidden" id="plan_id" value="{{ $plan->stripe_plan }}">
    <script src="{{ asset('vendor_panel/assets/plugins/nprogress/nprogress.js') }}"></script>
    <link href="{{ asset('vendor_panel/square.css') }}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/efec89e16a.js" crossorigin="anonymous"></script>
    <script
      type="text/javascript"
      src="https://sandbox.web.squarecdn.com/v1/square.js"
    ></script>
    <script>
      const appId = 'sandbox-sq0idb-vouX2uX_fhk_Dw3n_xhe7w';
      const locationId = 'L46AAJ77JKQ5D';

      async function initializeCard(payments) {
        const card = await payments.card();
        await card.attach('#card-container');

        return card;
      }

      async function createPayment(token, verificationToken) {
        const body = JSON.stringify({
          locationId,
          sourceId: token,
          verificationToken,
          idempotencyKey: window.crypto.randomUUID(),
          plan_id: $('#plan_id').val()
        });

        const paymentResponse = await fetch('/subscription', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          body,
        });

        if (paymentResponse.ok) {
          // return paymentResponse.json();

          location.href = "/vendor/analytics";
        }

        const errorBody = await paymentResponse.text();
        throw new Error(errorBody);
      }

      async function tokenize(paymentMethod) {
        const tokenResult = await paymentMethod.tokenize();
        if (tokenResult.status === 'OK') {
          return tokenResult.token;
        } else {
          let errorMessage = `Tokenization failed with status: ${tokenResult.status}`;
          if (tokenResult.errors) {
            errorMessage += ` and errors: ${JSON.stringify(
              tokenResult.errors
            )}`;
          }

          throw new Error(errorMessage);
        }
      }

      // Required in SCA Mandated Regions: Learn more at https://developer.squareup.com/docs/sca-overview
      async function verifyBuyer(payments, token) {
        const verificationDetails = {
          amount: '1.00',
          billingContact: {
            addressLines: ['123 Main Street', 'Apartment 1'],
            familyName: 'Doe',
            givenName: 'John',
            email: 'jondoe@gmail.com',
            country: 'GB',
            phone: '3214563987',
            region: 'LND',
            city: 'London',
          },
          currencyCode: 'GBP',
          intent: 'CHARGE',
        };

        const verificationResults = await payments.verifyBuyer(
          token,
          verificationDetails
        );
        return verificationResults.token;
      }

      // status is either SUCCESS or FAILURE;
      function displayPaymentResults(status) {
        const statusContainer = document.getElementById(
          'payment-status-container'
        );
        if (status === 'SUCCESS') {
          statusContainer.classList.remove('is-failure');
          statusContainer.classList.add('is-success');
        } else {
          statusContainer.classList.remove('is-success');
          statusContainer.classList.add('is-failure');
        }

        statusContainer.style.visibility = 'visible';
      }

      document.addEventListener('DOMContentLoaded', async function () {
        if (!window.Square) {
          throw new Error('Square.js failed to load properly');
        }

        let payments;
        try {
          payments = window.Square.payments(appId, locationId);
        } catch {
          const statusContainer = document.getElementById(
            'payment-status-container'
          );
          statusContainer.className = 'missing-credentials';
          statusContainer.style.visibility = 'visible';
          return;
        }

        let card;
        try {
          card = await initializeCard(payments);
        } catch (e) {
          console.error('Initializing Card failed', e);
          return;
        }

        async function handlePaymentMethodSubmission(event, card) {
          event.preventDefault();

          try {
            // disable the submit button as we await tokenization and make a payment request.
            cardButton.disabled = true;
            const token = await tokenize(card);
            const verificationToken = await verifyBuyer(payments, token);
            const paymentResults = await createPayment(
              token,
              verificationToken
            );
            displayPaymentResults('SUCCESS');

            console.debug('Payment Success', paymentResults);
          } catch (e) {
            cardButton.disabled = false;
            displayPaymentResults('FAILURE');
            console.error(e.message);
          }
        }

        const cardButton = document.getElementById('card-button');
        cardButton.addEventListener('click', async function (event) {
          await handlePaymentMethodSubmission(event, card);
        });
      });
    </script>
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



        <div class="page-wrapper">
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

            <div class="content-wrapper">
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card mt-4">

                <div class="card-header">

                    You will be charged ${{ number_format($plan->price, 2) }} for {{ $plan->name }} Plan after 3 months of trial for an year.

                </div>

  

                <div class="card-body">

  

                    {{-- <form id="payment-form" action="{{ route('subscription.create') }}" method="POST">

                        @csrf

                        <input type="hidden" name="plan" id="plan" value="{{ $plan->id }}">

                        <input type="hidden" name="platform" value="{{ $platform }}">

                                <div class="credit-card-form">
                                    <form>
                                      <div class="form-group">
                                        <label for="card-number">Card Number</label>
                                        <input type="text" id="card-number" placeholder="Card number">
                                      </div>
                                      <div class="form-group">
                                        <label for="card-holder">Card Holder</label>
                                        <input type="text" id="card-holder" placeholder="Card holder's name">
                                      </div>
                                      <div class="form-row row">
                                        <div class="form-group form-column col-md-6">
                                          <label for="expiry-date">Expiry Date</label>
                                          <input type="text" id="expiry-date" placeholder="MM/YY">
                                        </div>
                                        <div class="form-group form-column col-md-6">
                                          <label for="cvv">CVV</label>
                                          <input type="text" id="cvv" placeholder="CVV">
                                        </div>
                                      </div>
                                      <button type="submit" class="click-button" onclick="showLoading(event, this)">Pay Now</button>
                                    </form>
                                </div>

                    </form> --}}

                    <form id="payment-form">
                        <div id="card-container"></div>
                        <button id="card-button" type="button">subscripe</button>
                      </form>
                      <div id="payment-status-container"></div>

  

                </div>

            </div>

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
    function showLoading(event, button) {
  event.preventDefault(); // Prevent form submission

  button.innerHTML = "Processing Payment...";

  setTimeout(function() {
    button.innerHTML = "Payment completed.";
  }, 3000); // Change to the desired duration in milliseconds
}
</script>




</body>

</html>
