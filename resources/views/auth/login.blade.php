<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gesto</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('assets/plugins/font-awesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/icomoon/style.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/pagekit.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <livewire:styles />
</head>

<body>

    <div class="page-container">
        <div class="login">
            <div class="login-bg"></div>
            <div class="login-content">
                <div class="login-box">
                    <div class="login-header">
                        <h3>Gesto</h3>
                        <p>Bem vindo de volta! Por favor faça o login para continuar.</p>
                    </div>
                    <div class="login-body">
                        <form action="{{ route('auth') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="login" class="form-control" placeholder="login">
                                @error('login')
                                    <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control"
                                    placeholder="********">
                                @error('password')
                                    <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="custom-control custom-checkbox form-group">
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/plugins/jquery/jquery-3.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}">
    </script>
    <script src="{{ asset('assets/js/pagekit.min.js') }}"></script>
    <livewire:scripts />
</body>

</html>
