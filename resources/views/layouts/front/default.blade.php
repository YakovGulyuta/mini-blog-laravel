<!DOCTYPE html>
<html lang="en">
@include('parts.front.header')
<body>
<div id="wrapper">
    <header class="market-header header">
        <div class="container-fluid">
            <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="marketing-index.html"><img src="/assets/front/images/version/market-logo.png" alt=""></a>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="marketing-index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="marketing-category.html">Marketing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="marketing-category.html">Make Money</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="marketing-blog.html">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="marketing-contact.html">Contact Us</a>
                        </li>
                    </ul>
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="text" placeholder="How may I help?">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </div><!-- end container-fluid -->
    </header><!-- end market-header -->

    @yield('header')

    <section class="section lb @if(!Request::is('/')) m3rem @endif">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">

                    @yield('content')

                </div><!-- end col -->

                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    @include('layouts.front.sidebar')
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    @include('parts.front.footer')

    <div class="dmtop">Scroll to Top</div>

</div><!-- end wrapper -->


<script src="{{ asset('assets/front/js/front.js') }}"></script>

</body>
</html>

