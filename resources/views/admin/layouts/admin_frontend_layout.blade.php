<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Dhiraj Project :: Administrative Panel</title>

		@include('admin.layouts.components.style')

	</head>
	<body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            @include('admin.layouts.components.navbar')
            @include('admin.layouts.components.sidebar')

            <div class="content-wrapper">

                @yield('content')
        
            </div>

            @include('admin.layouts.components.footer')
		    @include('admin.layouts.components.js')
        </div>
        <!-- ./wrapper -->
    </body>
</html>