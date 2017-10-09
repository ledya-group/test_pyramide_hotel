<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pyramide Hotel') }}</title>

    <!-- Icons -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="images/icon/animated_favicon1.gif">
    <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <link href="{{ asset('css/datepicker.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div class="app header-fixed sidebar-menu-fixed aside-menu-hidden">
        <header class="app-header navbar">
            @include('layouts.admin._main_nav')
        </header>

        <div class="app-body">
            @include('layouts.admin._sidebar')

            <main id="app" class="main">
                <ol class="breadcrumb">
                    @yield('breadcrumb.menu')
                </ol>

                <div class="container-fluid">
                    
                    @yield('content')

                    <flash message="{!! session('flash') !!}"></flash>

                </div>
            </main>

            {{-- <aside class="aside-menu">
                @include('layouts.admin._aside_sidebar')
            </aside> --}}
        </div>

        <footer class="app-footer">
            LEDYA GROUP
            {{--  <a href="#"></a> © 2017 creativeLabs.
            <span class="float-right">
                Powered by <a href="#">Daniel and Kevin</a>
            </span>  --}}
        </footer>
    </div>

    <!-- Bootstrap and necessary plugins -->
    <script src="{{ asset('js/libs/jquery.js') }}"></script>
    <script src="{{ asset('js/libs/tether.js') }}"></script>
    <script src="{{ asset('js/libs/bootstrap.js') }}"></script>
    <script src="{{ asset('js/libs/pace.js') }}"></script>


    <!-- Plugins and scripts required by all views -->
    <script src="{{ asset('js/libs/Chart.js') }}"></script>


    <!-- GenesisUI main scripts -->

    <script src="{{ asset('js/app.js')}}"></script>

    <!-- Plugins and scripts required by this views -->

    <!-- Custom scripts required by this view -->
    <!--<script src="{{ asset('js/views/main.js') }}"></script>-->

    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
    "use strict";
    window.addEventListener("load", function() {
        var form = document.getElementById("needs-validation");
        form.addEventListener("submit", function(event) {
        if (form.checkValidity() == false) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add("was-validated");
        }, false);
    }, false);
    }());
    </script>

    @yield('script')
</body>
</html>
