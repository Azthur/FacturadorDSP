<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="sidebar-light sidebar-left-big-icons dashboard-system">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="googlebot" content="noindex">
    <meta name="robots" content="noindex">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Facturación Electrónica</title>

    <!-- Scripts -->

    <!-- Fonts -->
    {{--
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">--}}
    {{--
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">--}}

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light"
        rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('porto-light/vendor/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('porto-light/vendor/animate/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('porto-light/vendor/font-awesome/css/fontawesome-all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('porto-light/vendor/select2/css/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('porto-light/vendor/select2-bootstrap-theme/select2-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('porto-light/vendor/datatables/media/css/dataTables.bootstrap4.css') }}" />
    <link rel="stylesheet" href="{{ asset('porto-light/css/theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('porto-light/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/admin_styles.css') }}" />
    @if (file_exists(public_path('theme/custom_styles.css')))
        <link rel="stylesheet" href="{{ asset('theme/custom_styles.css') }}" />
    @endif

    {{--
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />--}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.26.29/sweetalert2.min.css" />
    <link rel="stylesheet" href="{{asset('porto-light/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{asset('porto-light/vendor/jquery-ui/jquery-ui.css')}}" />
    <link rel="stylesheet" href="{{asset('porto-light/vendor/jquery-ui/jquery-ui.theme.css')}}" />
    <link rel="stylesheet" href="{{asset('porto-light/vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('porto-light/vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />

    <!-- Daterange picker plugins css -->
    <link href="{{ asset('porto-light/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('porto-light/vendor/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('porto-light/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css')}}" />

    <link rel="stylesheet" href="{{asset('porto-light/vendor/jquery-loading/dist/jquery.loading.css')}}" />

    @stack('styles')
    <script src="{{ asset('porto-light/vendor/modernizr/modernizr.js') }}"></script>

    <style>
        .descarga {
            color: black;
            padding: 5px;
        }

        html.sidebar-light:not(.dark) ul.nav-main>li.nav-active>a {
            color: #0088CC;
        }

        ul.nav-main>li.nav-active>a {
            box-shadow: 2px 0 0 #0088CC inset;
        }

        /* ===== DARK MODE - PANEL SISTEMA ===== */
        html.dark-mode body,
        html.dark-mode .inner-wrapper,
        html.dark-mode section.body {
            background-color: #1a1d23 !important;
            color: #d0d6e0 !important;
        }
        html.dark-mode .header {
            background: #212530 !important;
            border-bottom: 1px solid #2e3340 !important;
            box-shadow: 0 2px 8px rgba(0,0,0,0.4) !important;
        }
        html.dark-mode .sidebar-left {
            background: #212530 !important;
            border-right: 1px solid #2e3340 !important;
        }
        html.dark-mode .sidebar-left .nav-main > li > a { color: #b0b8c8 !important; }
        html.dark-mode .sidebar-left .nav-main > li > a:hover,
        html.dark-mode .sidebar-left .nav-main > li.nav-active > a {
            background: #2e3340 !important;
            color: #60aaff !important;
        }
        html.dark-mode .card,
        html.dark-mode .panel,
        html.dark-mode .panel-body {
            background-color: #252932 !important;
            border-color: #2e3340 !important;
            color: #d0d6e0 !important;
        }
        html.dark-mode .card-header,
        html.dark-mode .panel-heading {
            background-color: #2b303b !important;
            border-bottom: 1px solid #2e3340 !important;
            color: #d0d6e0 !important;
        }
        html.dark-mode .table { color: #d0d6e0 !important; }
        html.dark-mode .table thead th {
            background-color: #2b303b !important;
            border-color: #3a404d !important;
            color: #a0aab8 !important;
        }
        html.dark-mode .table td,
        html.dark-mode .table th { border-color: #2e3340 !important; }
        html.dark-mode .table-striped tbody tr:nth-of-type(odd) { background-color: rgba(255,255,255,0.03) !important; }
        html.dark-mode .table-hover tbody tr:hover { background-color: rgba(96,170,255,0.07) !important; }
        html.dark-mode .form-control,
        html.dark-mode .input-group-text {
            background-color: #2b303b !important;
            border-color: #3a404d !important;
            color: #d0d6e0 !important;
        }
        html.dark-mode .form-control::placeholder { color: #606878 !important; }
        html.dark-mode .btn-default {
            background-color: #2e3340 !important;
            border-color: #3a404d !important;
            color: #d0d6e0 !important;
        }
        html.dark-mode a { color: #60aaff !important; }
        html.dark-mode a:hover { color: #90c8ff !important; }
        html.dark-mode .breadcrumb { background-color: #2b303b !important; }
        html.dark-mode .page-header { background-color: #252932 !important; border-color: #2e3340 !important; }
        html.dark-mode .modal-content {
            background-color: #252932 !important;
            border-color: #2e3340 !important;
            color: #d0d6e0 !important;
        }
        html.dark-mode .modal-header,
        html.dark-mode .modal-footer { border-color: #2e3340 !important; }
        html.dark-mode .dropdown-menu {
            background-color: #252932 !important;
            border-color: #2e3340 !important;
        }
        html.dark-mode .dropdown-item { color: #d0d6e0 !important; }
        html.dark-mode .dropdown-item:hover { background-color: #2e3340 !important; }
        /* Botón dark mode */
        #btn-dark-mode {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
            padding: 6px 10px;
            color: inherit;
            border-radius: 8px;
            transition: background 0.2s;
            margin-right: 8px;
            vertical-align: middle;
        }
        #btn-dark-mode:hover { background: rgba(128,128,128,0.15); }
    </style>
    <script>
        /* Anti-flash: aplicar dark mode antes del render */
        (function () {
            if (localStorage.getItem('system_dark_mode') === 'true') {
                document.documentElement.classList.add('dark-mode');
            }
        })();
    </script>
</head>

<body class="pr-0">
    <section class="body">
        <!-- start: header -->
        @include('system.layouts.partials.header')
        <!-- end: header -->
        <div class="inner-wrapper">
            <!-- start: sidebar -->
            @include('system.layouts.partials.sidebar')
            <!-- end: sidebar -->
            <section role="main" class="content-body" id="main-wrapper">
                @yield('content')
            </section>
        </div>
    </section>

    <!-- Vendor -->
    <script src="{{ asset('porto-light/vendor/jquery/jquery.js')}}"></script>
    <script src="{{ asset('porto-light/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
    <script src="{{ asset('porto-light/vendor/jquery-cookie/jquery-cookie.js')}}"></script>
    {{--
    <script src="{{asset('master/style-switcher/style.switcher.js')}}"></script>--}}
    <script src="{{ asset('porto-light/vendor/popper/umd/popper.min.js')}}"></script>
    <!-- <script src="{{ asset('porto-light/vendor/bootstrap/js/bootstrap.js')}}"></script> -->
    {{--
    <script src="{{ asset('porto-light/vendor/common/common.js')}}"></script> --}}
    <script src="{{ asset('porto-light/vendor/nanoscroller/nanoscroller.js')}}"></script>
    <script src="{{ asset('porto-light/vendor/magnific-popup/jquery.magnific-popup.js')}}"></script>
    <script src="{{ asset('porto-light/vendor/jquery-placeholder/jquery-placeholder.js')}}"></script>
    <script src="{{ asset('porto-light/vendor/select2/js/select2.js') }}"></script>
    <script src="{{ asset('porto-light/vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('porto-light/vendor/datatables/media/js/dataTables.bootstrap4.min.js')}}"></script>

    {{-- Specific Page Vendor --}}
    <script src="{{asset('porto-light/vendor/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{asset('porto-light/vendor/jqueryui-touch-punch/jqueryui-touch-punch.js')}}"></script>
    <script src="{{asset('porto-light/vendor/select2/js/select2.js')}}"></script>

    <script src="{{asset('porto-light/vendor/jquery-loading/dist/jquery.loading.js')}}"></script>

    <!--<script src="assets/vendor/select2/js/select2.js"></script>-->
    <script src="{{asset('porto-light/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>

    <!-- Moment -->
    <script src="{{ asset('porto-light/vendor/moment/moment.js') }}"></script>

    <!-- DatePicker -->
    <script src="{{asset('porto-light/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>

    <!-- Date range Plugin JavaScript -->
    <script src="{{ asset('porto-light/vendor/bootstrap-timepicker/bootstrap-timepicker.js') }}"></script>
    <script src="{{ asset('porto-light/vendor/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Theme Custom -->
    <script src="{{asset('porto-light/js/custom.js')}}"></script>

    <!-- Theme Initialization Files -->
    {{--
    <script src="{{asset('porto-light/js/theme.init.js')}}"></script> --}}

    {{--
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>--}}
    {{--
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>--}}

    @stack('scripts')

    <script src="{{ asset('js/manifest.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <!-- Theme Base, Components and Settings -->
    <script src="{{asset('porto-light/js/theme.js')}}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var btn = document.getElementById('btn-dark-mode');
            if (!btn) return;
            function updateIcon() {
                var isDark = document.documentElement.classList.contains('dark-mode');
                btn.innerHTML = isDark
                    ? '<i class="fas fa-sun" title="Modo claro"></i>'
                    : '<i class="fas fa-moon" title="Modo oscuro"></i>';
            }
            updateIcon();
            btn.addEventListener('click', function () {
                document.documentElement.classList.toggle('dark-mode');
                localStorage.setItem('system_dark_mode',
                    document.documentElement.classList.contains('dark-mode') ? 'true' : 'false'
                );
                updateIcon();
            });
        });
    </script>
</body>

</html>