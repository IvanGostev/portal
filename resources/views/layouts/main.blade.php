<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>СИЛОВЫЕ МАШИНЫ АДМИН ПАНЕЛЬ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/air-datepicker.css')}}">

</head>
{{--        dark-mode--}}
<body class="hold-transition layout-fixed layout-navbar-fixed layout-footer-fixed">
<style>

    .form-check-input:checked {
        background-color: rgb(33, 37, 41);
        border-color: rgb(33, 37, 41);
    }
</style>
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <h1 class="font-weight-bolder">СИЛОВЫЕ МАШИНЫ</h1>
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark justify-content-between">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit"
                            class="btn btn-outline-light fw-normal">Выйти
                    </button>
                </form>
            </li>
        </ul>

    </nav>
    <!-- /.navbar -->
    <style>
        .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
            background-color: #343a40;
        }
        a {
            color: #343a40;
        }
    </style>

    <!-- Main Sidebar Container -->

    @include('includes.sidebar')

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer" style="position: relative">
        <strong>Авторское право &copy; 2024 <a href="/">СИЛОВЫЕ МАШИНЫ</a>.</strong>
        Все права защищены.
        <div class="float-right d-none d-sm-inline-block">
            <b>Версия</b> 1.0.0
        </div>
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('admin/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('admin/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('admin/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('admin/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('admin/plugins/chart.js/Chart.min.js')}}"></script>


<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('admin/dist/js/pages/dashboard2.js')}}"></script>

<script src="{{asset('admin/js/air-datepicker.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
<script src="{{asset('admin/js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(document).ready(function () {
        $('#summernote').summernote({
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['codeview', 'help']]
            ]
        });
    });
    $(document).ready(function () {
        $('#summernote1').summernote({
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['codeview', 'help']]
            ]
        });
    });
    $(document).ready(function () {
        $('#summernote2').summernote({
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['codeview', 'help']]
            ]
        });
    });
    $(document).ready(function () {
        $('#summernote3').summernote({
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['codeview', 'help']]
            ]
        });
    });

    new AirDatepicker('#input-date-pi', {
        multipleDates: true,

    })
    new AirDatepicker('#input-date-pi-range', {
        range: true,
        dateFormat: 'yyyy-MM-dd',

    })

    new AirDatepicker('#input-date-pi-promocode', {
        multipleDates: false,

        dateFormat: 'yyyy-MM-dd',
    })

</script>
<script
    type="text/javascript"
    src="https://code.jquery.com/jquery-1.8.3.js"
></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jqplot/1.0.4/jquery.jqplot.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jqplot/1.0.4/jquery.jqplot.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/jqplot/1.0.4/plugins/jqplot.donutRenderer.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jqplot/1.0.4/plugins/jqplot.pieRenderer.min.js"></script>
@if(isset($speeds))
<script type='text/javascript'>
    let data = [
        ['5', {{$speeds['5']}}],
        ['4', {{$speeds['4']}}],
        ['3',  {{$speeds['3']}}],
        ['2',  {{$speeds['2']}}],
        ['1', {{$speeds['1']}}],
    ];
    let plot1 = jQuery.jqplot ('chart1', [data],
        {
            seriesDefaults: {
                // Make this a pie chart.
                renderer: jQuery.jqplot.PieRenderer,
                rendererOptions: {
                    showDataLabels: true,
                }
            },
            legend: {
                show: true,
                location: 's',
                border: '0px',
                fontSize: '16px',
                rendererOptions: {
                    numberRows: '12',
                    numberColumns: '8'
                }
            },
            title: {
                text: 'Оперативность доставки'
            }
        }
    );



    data = [
        ['5', {{$qualities['5']}}],
        ['4', {{$qualities['4']}}],
        ['3',  {{$qualities['3']}}],
        ['2',  {{$qualities['2']}}],
        ['1', {{$qualities['1']}}],
    ];
    let plot2 = jQuery.jqplot ('chart2', [data],
        {
            seriesDefaults: {
                // Make this a pie chart.
                renderer: jQuery.jqplot.PieRenderer,
                rendererOptions: {
                    showDataLabels: true,
                }
            },
            legend: {
                show: true,
                location: 's',
                border: '0px',
                fontSize: '16px',
                rendererOptions: {
                    numberRows: '12',
                    numberColumns: '8'
                }
            },
            title: {
                text: 'Качество товаров/материалов'
            }
        }
    );
    data = [
        ['5', {{$conditions['5']}}],
        ['4', {{$conditions['4']}}],
        ['3',  {{$conditions['3']}}],
        ['2',  {{$conditions['2']}}],
        ['1', {{$conditions['1']}}],
    ];
    let plot3 = jQuery.jqplot ('chart3', [data],
        {
            seriesDefaults: {
                // Make this a pie chart.
                renderer: jQuery.jqplot.PieRenderer,
                rendererOptions: {
                    showDataLabels: true,
                }
            },
            legend: {
                show: true,
                location: 's',
                border: '0px',
                fontSize: '16px',
                rendererOptions: {
                    numberRows: '12',
                    numberColumns: '8'
                }
            },
            title: {
                text: 'Соблюдение условий контракта'
            }
        }
    );
    data = [
        ['5', {{$interactions['5']}}],
        ['4', {{$interactions['4']}}],
        ['3',  {{$interactions['3']}}],
        ['2',  {{$interactions['2']}}],
        ['1', {{$interactions['1']}}],
    ];
    let plot4 = jQuery.jqplot ('chart4', [data],
        {
            seriesDefaults: {
                // Make this a pie chart.
                renderer: jQuery.jqplot.PieRenderer,
                rendererOptions: {
                    showDataLabels: true,
                }
            },
            legend: {
                show: true,
                location: 's',
                border: '0px',
                fontSize: '16px',
                rendererOptions: {
                    numberRows: '12',
                    numberColumns: '8'
                }
            },
            title: {
                text: 'Уровень взаимодействия'
            }
        }
    );
</script>
@endif
</body>
</html>
