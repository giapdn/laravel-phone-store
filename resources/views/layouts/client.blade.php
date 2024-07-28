<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electron - HTML Ecommerce Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/client/css/bootstrap.min.css')}}"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/client/css/slick.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/client/css/slick-theme.css')}}"/>

    <!-- outsider -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/client/css/nouislider.min.css')}}"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{asset('assets/client/css/font-awesome.min.css')}}">

    <!-- Custom stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/client/css/style.css')}}"/>
</head>
<body>
<!-- HEADER -->
@include('components.client.header')
<!-- /HEADER -->

<!-- NAVIGATION -->
@include('components.client.navigation')
<!-- /NAVIGATION -->

<!-- CHILD'S CONTENT RENDER HERE -->
@yield('content')
<!-- /CHILD'S CONTENT RENDER HERE -->

<!-- NEWSLETTER -->
<div id="newsletter" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                    <form>
                        <input class="input" type="email" placeholder="Enter Your Email">
                        <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                    </form>
                    <ul class="newsletter-follow">
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /NEWSLETTER -->

<!-- FOOTER -->
@include('components.client.footer')
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="{{asset('assets/client/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/client/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/client/js/slick.min.js')}}"></script>
<script src="{{asset('assets/client/js/nouislider.min.js')}}"></script>
<script src="{{asset('assets/client/js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('assets/client/js/main.js')}}"></script>

</body>
</html>
