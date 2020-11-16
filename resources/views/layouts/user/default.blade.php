<!DOCTYPE html>
<html>
@include('parts.user.header')

<body class="hold-transition register-page">

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('/')}}" class="nav-link">Home</a>
        </li>
    </ul>
</nav>

@yield('content')

<script src="{{ asset('assets/admin/js/admin.js') }}"></script>
</body>
</html>
