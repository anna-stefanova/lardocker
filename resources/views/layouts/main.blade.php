<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>NEWSROOM - Aggregator News</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    {{--<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">--}}

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/lib/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
<x-header></x-header>

<!-- News With Sidebar Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">

            @yield('content')

        </div>
    </div>
</div>
<!-- News With Sidebar End -->


<x-footer></x-footer>


<!-- Back to Top -->
<a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>


<!-- JavaScript Libraries -->
<script src="{{ asset('assets/lib/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/lib/bootstrap.bundle.min.js') }}"></script>
{{--<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>--}}

<!-- Contact Javascript File -->
{{--
<script src="mail/jqBootstrapValidation.min.js"></script>--}}
{{--<script src="mail/contact.js"></script>--}}


<!-- Template Javascript -->
<script src="{{ asset('assets/main.js') }}"></script>
</body>

</html>
