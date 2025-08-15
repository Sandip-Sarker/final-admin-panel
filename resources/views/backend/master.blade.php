<!doctype html>
<html lang="en" dir="ltr">
<head>

    <!-- meta-->
    @include('backend.partial.meta')

    <!-- style-->
    @include('backend.partial.style')
{{--    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>--}}
</head>

<body class="ltr app sidebar-mini">

    <!-- Switcher-->
    @include('backend.partial.switcher-loader')



    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            @include('backend.partial.header')

            <!--APP-SIDEBAR-->
            @include('backend.partial.sidebar')

            <!--app-content open-->
            <div class="app-content main-content mt-0">
                <div class="side-app">
                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        @yield('main-content')

                    </div>
                </div>
            </div>
            <!-- CONTAINER CLOSED -->
        </div>

        <!-- Country-selector modal-->
        @include('backend.partial.modal.country-select')

        <!--TASK MODAL-->
        @include('backend.partial.modal.task')

        <!-- FOOTER -->
        @include('backend.partial.footer')


    </div>
    <!-- page -->

    @include('backend.partial.script')

    @stack('scripts')

</body>
</html>
