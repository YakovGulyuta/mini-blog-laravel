<!DOCTYPE html>
<html>
{{--HEAD THIS--}}
@include('parts.header.admin')
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->

{{--THIS CONTENT--}}
@yield('content')

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('js/jquery.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('js/bootstrap.bundle.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('js/demo.js')}}"></script>
</body>
</html>
