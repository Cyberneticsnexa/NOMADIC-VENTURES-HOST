<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ getUploadImage($site_settings->meta_icon, 'logo') }}">
    <title>{{ $site_settings->site_name }} | Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="{{ config('site-specific.live-path') }}/public/assets/back-end/default/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet"
        href="{{ config('site-specific.live-path') }}/public/assets/back-end/default/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet"
        href="{{ config('site-specific.live-path') }}/public/assets/back-end/default/dist/css/adminlte.min.css">
    <style>
        /* CSS for background image */
        body {
            background-image: url('{{ getUploadImage($site_settings->login_bg_image, "logo") }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100%;
        }

        .card-primary {
            background-color: rgba(255, 255, 255, 0.8);
            /* Optional: Overlay to improve readability */
            padding: 20px;
            margin: auto;
            max-width: 400px;
            border-radius: 10px;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <div>
                    <img style="width: 100px;border-radius:5%" src="{{ getUploadImage($site_settings->logo, 'logo') }}"
                        alt="">
                </div>
                <a href="/" class="h2" style="color:#8F8919"><b>{{ $site_settings->site_name }}</b></a>
            </div>
            <div class="card-body">
                <form action="/signin" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="font-weight-bold text-danger ml-2">{{ $error }}</div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ config('site-specific.live-path') }}/public/assets/back-end/default/plugins/jquery/jquery.min.js">
    </script>
    <!-- Bootstrap 4 -->
    <script
        src="{{ config('site-specific.live-path') }}/public/assets/back-end/default/plugins/bootstrap/js/bootstrap.bundle.min.js">
    </script>
    <!-- AdminLTE App -->
    <script src="{{ config('site-specific.live-path') }}/public/assets/back-end/default/dist/js/adminlte.min.js"></script>
</body>

</html>
