<!DOCTYPE html>
<html lang="en">
<head
    lang="en"
    class="light-style layout-menu-fixed"
    data-theme="theme-default"
    data-assets-path="{{ asset("../assets/") }}"
>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name', 'Admin') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset("../assets/img/favicon/favicon.ico") }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset("../assets/vendor/fonts/boxicons.css") }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset("../assets/vendor/css/core.css") }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset("../assets/vendor/css/theme-default.css") }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset("../assets/css/demo.css") }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset("../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css") }}" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
    <!-- Page CSS -->

    <!-- Helpers -->
    <script defer src="{{ asset("../assets/vendor/js/helpers.js") }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script defer src="{{ asset("../assets/js/config.js") }}"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">

    <!-- First, defer the scripts with dependencies -->
    <script defer src="{{ asset("../assets/vendor/libs/jquery/jquery.js") }}"></script>
    <script defer src="{{ asset("../assets/vendor/libs/popper/popper.js") }}"></script>
    <script defer src="{{ asset("../assets/vendor/js/bootstrap.js") }}"></script>

    <!-- Then, defer other scripts without dependencies -->
    <script defer src="{{ asset("../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js") }}"></script>
    <script defer src="{{ asset("../assets/vendor/libs/masonry/masonry.js") }}"></script>
    <script defer src="{{ asset("../assets/vendor/libs/apex-charts/apexcharts.js") }}"></script>
    <script defer src="{{ asset("../assets/vendor/libs/bootstrap-select/bootstrap-select.js") }}"></script>

    <!-- Defer the remaining scripts -->
    <script defer src="{{ asset("../assets/vendor/js/menu.js") }}"></script>
    <script defer src="{{ asset("../assets/js/main.js") }}"></script>
    <script defer src="{{ asset("../assets/js/dashboards-analytics.js") }}"></script>
    <script defer src="{{ asset("../assets/js/extended-ui-perfect-scrollbar.js") }}"></script>
    <script defer async src="https://buttons.github.io/buttons.js"></script>
</head>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('layout.partials.admin.sidebar')  
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->
                @include('layout.partials.admin.navbar')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    {{ $slot }}
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <script>
        
    </script>
</body>

</html>