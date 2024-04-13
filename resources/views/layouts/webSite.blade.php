<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.head')
</head>

<body class="{{Request::is('/') ? 'common-home' : 'information' }}">
    @include('include.navigation')

    <!-- end navigation -->
    @yield('content')
    <!-- footer -->
    @include('include.footer')
    <!-- end footer -->
    @include('include.script')
    @yield('script')
</body>

</html>
