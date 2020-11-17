<!DOCTYPE html>
<html lang="en">
@include('parts.front.header')
<body>
<div id="wrapper">

    @include('parts.front.navbar')

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

