<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{url('theme_property')}}/fonts/icomoon/style.css" />
    <link rel="stylesheet" href="{{url('theme_property')}}/fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="{{url('theme_property')}}/css/tiny-slider.css" />
    <link rel="stylesheet" href="{{url('theme_property')}}/css/aos.css" />
    <link rel="stylesheet" href="{{url('theme_property')}}/css/style.css" />
    <link rel="stylesheet" href="{{asset('/toastr/toastr.min.css') }}">

    @stack('css')

    <title>
        E katalog
    </title>
</head>

<body>
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    @include('theme.user.navbar')

    @yield('content')

    @include('theme.user.footer')
    <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <script src="{{url('theme_property')}}/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('theme_property')}}/js/tiny-slider.js"></script>
    <script src="{{url('theme_property')}}/js/aos.js"></script>
    <script src="{{url('theme_property')}}/js/navbar.js"></script>
    <script src="{{url('theme_property')}}/js/counter.js"></script>
    <script src="{{url('theme_property')}}/js/custom.js"></script>
    <script src="{{url('sneat')}}/assets/vendor/libs/jquery/jquery.js"></script>

    <script src="{{url('toastr')}}/toastr.min.js"></script>

    <script>
    toastr.options.timeOut = 1500;
    toastr.options.showMethod = 'slideDown';
    toastr.options.hideMethod = 'slideUp';
    toastr.options.closeMethod = 'slideUp';
    @if(session()->has('success'))
        toastr.success('{{session()->get("success")}}')
    @elseif(session()->has('error'))
        toastr.error('{{session()->get("error")}}')
    @elseif($errors->any())
        toastr.error(@json($errors->first()))
    @endif
</script>
    @stack('js')
    
</body>

</html>