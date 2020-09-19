<!DOCTYP html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
         @include('dashboard.admin.includes.head')
    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
            @include('dashboard.admin.includes.navbar')

            

            <!-- Main Sidebar Container -->
            @include('dashboard.admin.includes.main-sidebar')

            <!-- Content Wrapper. Contains page content -->
            
            <div class="content-wrapper">
                @include('dashboard.admin.includes.messages')
                
                @yield('content')
            </div>

            <!-- Control Sidebar -->
            @include('dashboard.admin.includes.control-sidebar')

            <!-- Main Footer -->
            @include('dashboard.admin.includes.footer')
        </div>
        <!-- REQUIRED SCRIPTS -->
        <script src="/js/app.js"></script>
    </body>
</html>
