<!DOCTYPE html>
<html>
<head>
    <title>@yield('page_title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">

@yield('css')

</head>



<div class="app-container" >
    <div class="fadetoblack visible-xs"></div>
    <div class="row content-container">

        <div class="container-fluid" id="app">
            <div class="side-body padding-top">
                @yield('page_header')
                @yield('content')
            </div>
        </div>
    </div>
</div>

@yield('javascript')

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif

    @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}")
    @endif

    @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}")
    @endif

</script>

</body>
</html>
