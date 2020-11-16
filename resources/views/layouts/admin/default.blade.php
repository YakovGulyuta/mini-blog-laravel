<!DOCTYPE html>
<html>
{{--HEAD THIS--}}
@include('parts.admin.header')
<body class="hold-transition sidebar-mini">

<div class="wrapper">

@include('parts.admin.navbar.navbar')
@include('parts.admin.aside.aside')
{{--THIS CONTENT--}}

@yield('content')

<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
@include('parts.admin.footer')

</div>
<!-- jQuery -->
<script src="{{asset('js/jquery.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('js/bootstrap.bundle.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('js/demo.js')}}"></script>
<script>
    $('.nav-sidebar a').each(function(){
        let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
        let link = this.href;
        if(link == location){
            $(this).addClass('active');
            $(this).closest('.has-treeview').addClass('menu-open');
        }
    });
</script>
</body>
</html>
