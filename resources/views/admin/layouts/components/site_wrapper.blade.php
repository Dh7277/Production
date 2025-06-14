<!-- Site wrapper -->
<div class="wrapper">

    @include('admin.layouts.components.navbar')
    
    <!-- Main Sidebar Container -->
        @include('admin.layouts.components.sidebar')
    <!-- Content Wrapper. Contains page content -->
    
    <div class="content-wrapper">

        @yield('child-content')

    </div>
    <!-- /.content-wrapper -->

    @include('admin.layouts.components.footer')

</div>
<!-- ./wrapper -->