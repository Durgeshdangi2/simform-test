<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <!-- Google Font: Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-5/css/all.css')  }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')  }}">
    <!-- Date Picker -->
    <link rel="stylesheet"
          href="{{ asset('assets/plugins/Date-Time-Picker-Bootstrap-4/css/bootstrap-datetimepicker.min.css') }}">
@stack('head.start')
<!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css')  }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/site.css')  }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css')  }}" />
    <script type="text/javascript">window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
    @stack('head.end')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed">
@stack('body.start')
<div id="div-loading" class="loader-wrapper" style="display: none;">
    <div class="loader">
        <div class="box">
            <div class="box-body">
                <i class="fas fa-2x fa-sync fa-spin"></i>
                <span>{{__('common.loading_wait')}}</span>
            </div>
        </div>
    </div>
</div>
<!-- Site wrapper -->
<div class="wrapper">
    @include('includes.navbar')
    @include('includes.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @include('includes.header')
    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @include('includes.alerts')
                @yield('content')
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('includes.footer')
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js')  }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')  }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('assets/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/js/adminlte.min.js')  }}"></script>
<!-- Site Js -->
<script src="{{ asset('assets/js/site.js')  }}"></script>
<script type="text/javascript">
    $(function () {
        @if (session('success'))
        alertMessage('success', '{{ session("success") }}');
        @endif
        @if (session('resent'))
        alertMessage('success', "{{ __('auth.verification') }}");
        @endif
        @if (session('message'))
        alertMessage('info', '{{ session("message") }}');
        @endif
        @if (session('error'))
        alertMessage('danger', '{{ session("error") }}');
        @endif
    });
</script>
@stack('body.end')
</body>
</html>
