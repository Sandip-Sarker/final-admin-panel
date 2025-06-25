<!doctype html>
<html lang="en" dir="ltr">
<head>

    <!-- meta-->
    @include('backend.partial.meta')

    <!-- style-->
    @include('backend.partial.style')

</head>


<body class="ltr login-img">


    <!-- Switcher-->
    @include('backend.partial.switcher-loader')


    {{-- Main-content --}}
    @yield('main-content')


    @include('backend.partial.script')
</body>

</html>
