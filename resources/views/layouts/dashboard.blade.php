<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="/icon.png">
    <title>{{ config('app.name') }} · @yield('title')</title>

    <link rel="stylesheet" href="/assets/plugins/perfect-scrollbar/perfect-scrollbar.css"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="/css/dashboard.css"/>
    <link rel="stylesheet" href="/assets/DataTables/DataTables-1.10.23/css/jquery.dataTables.css"/>
    <link rel="stylesheet" href="/assets/DataTables/DataTables-1.10.23/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.css">
    @stack('css')
</head>
<body>
    <div class="block hidden"></div>
    <div class="main-wrapper" id="app">
        @include('layouts.sidebar')
        <div class="page-wrapper">
            @include('layouts.header')
            <div class="page-content">
            @yield('content')
            </div>
        @include('layouts.footer')
        </div>
    </div>
    @include('layouts/modal')

    <form id="logout-form" action="{{ url('/logout') }}" method="POST">@csrf</form>
    <script src="/js/dashboard.js"></script>
    <script>
        $('a[data-toggle="tab"]').on('shown.bs.tab', function () {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });
    </script>
    <script src="/assets/plugins/feather-icons/feather.min.js"></script>
    <script src="/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/template.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/assets/DataTables/DataTables-1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="/assets/DataTables/DataTables-1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>
    @stack('js')
</body>
</html>