<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pyramide-Hotel') }}</title>

    <!-- Icons -->
    <link rel="shortcut icon" href="images/icon/animated_favicon1.gif">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
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
    <div id="app" class="app header-fixed">
        <header class="app-header navbar">
            <a class="navbar-brand" href="#" style="background-image:none"> 
                Pyramide Hotel  
            </a>
        </header>

        <div class="app-body">

            <main class="main">
                <div class="container-fluid">
                    @yield('content')

                    <flash message="{!! session('flash') !!}"></flash>
                </div>
            </main>

        </div>

        <footer class="app-footer">
            {{--    --}}
        </footer>

        <!-- Global Site Tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-107785044-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-107785044-1');
        </script>


        <!-- Bootstrap and necessary plugins -->
        <script src="{{ asset('js/libs/jquery.js') }}"></script>
        <script src="{{ asset('js/libs/tether.js') }}"></script>
        <script src="{{ asset('js/libs/bootstrap.js') }}"></script>
        <script src="{{ asset('js/libs/pace.js') }}"></script>


        <!-- Plugins and scripts required by all views -->
        <script src="{{ asset('js/libs/Chart.js') }}"></script>

        <script src="{{ asset('js/app.js')}}"></script>

        @yield('script')
    </div>
</body>
</html>
