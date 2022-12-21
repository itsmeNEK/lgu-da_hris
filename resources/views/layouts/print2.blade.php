<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/DA-logo.png') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('customCSS')
    <style>
        body {
            background: rgb(204, 204, 204);
            /* transform: scale(1.04); */
            s
        }

        page {
            background: white;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
        }

        page[size="A4"] {
            width: 22cm;
            height: 29.7cm;
        }

        page[size="Legal"] {
            width: 22cm;
            height: 36cm;
        }

        page[size="Legal"][layout="landscape"] {
            width: 36cm;
            height: 22cm;
        }

        page[size="A4"][layout="landscape"] {
            width: 29.7cm;
            height: 22cm;
        }

        @media print {

            body,
            page {
                margin: 0;
                box-shadow: 0;
                -webkit-print-color-adjust: exact;
            }
        }

        @page {
            size: auto;
            margin: 0;
        }
    </style>
</head>

<body class="fs-6">
    @yield('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>
