<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <title>Gesto</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('assets/plugins/font-awesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/icomoon/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/pagekit.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <livewire:styles />

</head>

<body class="collapsed-sidebar">

    <div class="page-container">
        <div class="page-sidebar">
            <div class="profile-menu">
                <a href="#">
                    <img src="{{ asset('assets/images/avatars/avatar-unisex.png') }}" width="50px">
                </a>
            </div>
        </div>

        <div class="settings-overlay"></div>

        <div class="page-content">
            <div class="secondary-sidebar">
                <div class="secondary-sidebar-bar">
                    <a href="#" class="logo-box">M</a>
                </div>
                <div class="secondary-sidebar-menu">
                    @include('components.navbar')
                </div>
            </div>

            <div class="page-header">
                <nav class="navbar navbar-default navbar-expand-md">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <div class="logo-sm">
                                <a href="javascript:void(0)" id="sidebar-toggle-button"><i class="fas fa-bars"></i></a>
                                <a class="logo-box" href="#"><span>M</span></a>
                            </div>
                        </div>

                        <div class="collapse navbar-collapse justify-content-between" id="bs-example-navbar-collapse-1">
                        </div>
                    </div>
                </nav>
            </div>

            <div class="page-inner no-page-title">
                <div id="main-wrapper">
                    @yield('content')
                </div>

                <div class="page-footer">
                    <p>{{ date('Y') }} &copy; Gesto </span><span
                            class="badge badge-info">v3.0.0</span></p>
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('assets/plugins/jquery/jquery-3.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}">
        < script src = "{{ asset('assets/js/pages/form-masking-custom.js') }}" >

    </script>
    <script src="{{ asset('assets/plugins/mask/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('assets/js/pagekit.min.js') }}"></script>
    <livewire:scripts />
    <script src="{{ asset('assets/js/pages/modal.js') }}"></script>
</body>

</html>
