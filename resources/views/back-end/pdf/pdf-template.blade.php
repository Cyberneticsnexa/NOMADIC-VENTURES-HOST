<?php
use Carbon\Carbon;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap-grid.min.css"
        integrity="sha512-QTQigm89ZvHzwoJ/NgJPghQPegLIwnXuOXWEdAjjOvpE9uaBGeI05+auj0RjYVr86gtMaBJRKi8hWZVsrVe/Ug=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap-reboot.min.css"
        integrity="sha512-YmRhY1UctqTkuyEizDjgJcnn0Knu5tdpv09KUI003L5tjfn2YGxhujqXEFE7fqFgRlqU/jeTI+K7fFurBnRAhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.min.css"
        integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>
        {{$title}}
    </title>

    <style>
        .company-name {
            font-size: 16px;
            font-weight: bold;
            color: #8F8919;
        }

        .register-details {
            font-size: 9px;
        }

        .contacts {
            font-size: 10px;
            font-weight: bold
        }

        .title {
            font-size: 15px;
            font-weight: bold;
        }

        .tr-title , .tr-confirmation-info {
            background-color: #01204E;
            color: #BF8F00;
            text-align: center;
        }
        .tr-title{
            font-size: 12px;
        }

        .t-content-title {
            font-size: 12px;
            font-weight: bold;
            margin: 2px
        }

        .td-details {
            padding-left: 5%;
        }

        .td-details {
            font-size: 12px;
        }
        .tr-confirmation-info .t-content-title{
            font-size: 12px;
        }

        .room-info {
            text-align: center;
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #f8f9fa;
            text-align: center;
            padding: 10px 0;
            font-size: 8px;
        }

        .footer p {
            margin: 0;
            font-size: 12px;
        }

        .content {
            padding-bottom: 100px;
        }
        .card{
            border: none;
        }
        .td-details-additional{
            font-size: 11px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <table>
                                <tr>
                                    <td rowspan="2">
                                        <img style="width:150px;border-radius: 5%"
                                            src="{{ getBase64Image($site_settings->logo, 'logo') }}" alt="">
                                    </td>
                                    <td colspan="8">
                                        <p class="mt-2 ml-4">
                                            <span class="company-name">NOMADIC VENTURES (PVT) LTD</span>
                                            <br>
                                            <span class="register-details">
                                                Registration Number: PV 00295858
                                            </span>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="8">
                                        <p class="ml-4 contacts">
                                            No 6/12 , 3rd Lane, Nawala Road, Rajagiriya, Sri Lanka.<br>0094 112 474
                                            472
                                            <br>
                                            <a target="_blank"
                                                href="www.nomadicsrilanka.com">www.nomadicsrilanka.com</a>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="card-body">
                            @include($body_content)
                        </div>
                        <div class="footer">
                            @if (isset($footer_content))
                                @include($footer_content)
                            @endif
                            <div style="text-align: center;font-size: 10px;">
                                <strong>NOMADIC VENTURES (PVT) LTD</strong>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/js/bootstrap.min.js"
        integrity="sha512-8qmis31OQi6hIRgvkht0s6mCOittjMa9GMqtK9hes5iEQBQE/Ca6yGE5FsW36vyipGoWQswBj/QBm2JR086Rkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/js/bootstrap.bundle.min.js"
        integrity="sha512-iceXjjbmB2rwoX93Ka6HAHP+B76IY1z0o3h+N1PeDtRSsyeetU3/0QKJqGyPJcX63zysNehggFwMC/bi7dvMig=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
