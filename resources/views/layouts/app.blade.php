<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BEAUTY PLUS</title>
    <!-- Styles -->
    <link href="{{ asset('template/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Sweet Alert Notif -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet">
    <!-- -->
    <!-- Air DatePicker -->
    <link href="{{ asset('air-datepicker/dist/css/datepicker.min.css') }}" rel="stylesheet" type="text/css">
    
</head>
<body>
    <!-- Fixed navbar -->
    
    <!-- End Fixed navbar -->

    <!-- Content -->
    @yield('content')
    <!-- End Content -->

    
    @include('includes.footer')
    
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/js/retina-1.1.0.js') }}"></script>
    <script src="{{ asset('template/js/jquery.hoverdir.js') }}"></script>
    <script src="{{ asset('template/js/jquery.hoverex.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('template/js/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('template/js/custom.js') }}"></script>
    <!-- Sweet Alert Notif -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    @include('sweet::alert')
    <!-- -->

    <!-- Air DatePicker -->
    <script src="{{ asset('air-datepicker/dist/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('air-datepicker/dist/js/i18n/datepicker.en.js') }}"></script>
    <!-- -->

    <script>
        //for walkin customer
        $('#addHomeReservation').datepicker({
            position: 'bottom center',
            language: 'en',
            minDate: new Date(), // Now can select only dates, which goes after today
        })

    </script>
</body>
</html>
