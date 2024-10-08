<!DOCTYPE html>
<html lang="en">

<head lang="en" class="light-style layout-menu-fixed" data-theme="theme-default"
    data-assets-path="{{ asset('../assets/') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Dormitory Management System'}}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('../assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('../assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('../assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('../assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('../assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Page CSS -->

    <!-- Helpers -->
    <script defer src="{{ asset('../assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script defer src="{{ asset('../assets/js/config.js') }}"></script>

    <!-- First, defer the scripts with dependencies -->
    <script defer src="{{ asset('../assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script defer src="{{ asset('../assets/vendor/libs/popper/popper.js') }}"></script>
    <script defer src="{{ asset('../assets/vendor/js/bootstrap.js') }}"></script>

    <!-- Then, defer other scripts without dependencies -->
    <script defer src="{{ asset('../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script defer src="{{ asset('../assets/vendor/libs/masonry/masonry.js') }}"></script>
    <script defer src="{{ asset('../assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Defer the remaining scripts -->
    <script defer src="{{ asset('../assets/vendor/js/menu.js') }}"></script>
    <script defer src="{{ asset('../assets/js/main.js') }}"></script>
    <script defer src="{{ asset('../assets/js/dashboards-analytics.js') }}"></script>
    <script defer src="{{ asset('../assets/js/extended-ui-perfect-scrollbar.js') }}"></script>
    <script defer async src="https://buttons.github.io/buttons.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @livewire('AdminPageIncludes.Sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->
                @livewire('AdminPageIncludes.Navbar')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    {{ $slot }}
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme" aria-atomic="true">
                        <div class="bs-toast toast toast-placement-ex my-3 mx-4 fade bg-success bottom-0 end-0 hide"
                            role="alert" aria-live="assertive" aria-atomic="true" id="toast-success">
                            <div class="toast-header">
                                <i class="bx bx-bell me-2"></i>
                                <div class="me-auto fw-semibold">System</div>
                                <button type="button" class="btn-close" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="toast-body" id="toast-success-message">
                                Fruitcake chocolate bar tootsie roll gummies gummies jelly beans cake.
                            </div>
                        </div>

                        <div class="bs-toast toast toast-placement-ex my-3 mx-4 fade bg-danger bottom-0 end-0 hide"
                            role="alert" aria-live="assertive" aria-atomic="true" id="toast-danger">
                            <div class="toast-header">
                                <i class="bx bx-bell me-2"></i>
                                <div class="me-auto fw-semibold">System</div>
                                <button type="button" class="btn-close" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="toast-body" id="toast-danger-message">
                                Fruitcake chocolate bar tootsie roll gummies gummies jelly beans cake.
                            </div>
                        </div>
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
        document.addEventListener('livewire:init', () => {
            Livewire.on('showToast', (event) => {
                let getToastMode = event[0].mode;
                let getToastMessage = event[0].message;

                if (getToastMode === 'success') {
                    $('#toast-success-message').text(getToastMessage);
                    new bootstrap.Toast($('#toast-success')).show();
                }

                if (getToastMode === 'danger') {
                    $('#toast-danger-message').text(getToastMessage);
                    new bootstrap.Toast($('#toast-danger')).show();
                }

                if (getToastMode === 'warning') {
                    $('#toast-warning-message').text(getToastMessage);
                    new bootstrap.Toast($('#toast-danger')).show();
                }
            });
        });
    </script>
</body>

</html>
