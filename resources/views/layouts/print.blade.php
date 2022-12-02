<html lang="en">

<head>
    <meta http-equiv=Content-Type content="text/html; charset=windows-1252">
    <meta name=ProgId content=Excel.Sheet>
    <meta name=Generator content="Microsoft Excel 15">
    <link rel=File-List href="pdsCLean_files/filelist.xml">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/pdsTable.css') }}" rel="stylesheet">
    <style>
        .page1 {
            page-break-after: always !important;
            margin-top: 10px;
        }

        .page2 {
            page-break-after: always !important;
            margin-top: 10px;
        }

        .page3 {
            page-break-after: always !important;
            /* margin-top: 10px; */
        }

        .page4 {
            page-break-after: always !important;
            /* margin-top: 10px; */
        }

        #page {
            max-height: 36cm !important;
            height: 36cm !important;
        }


        @media print {
            body {
                margin: 0;
                -webkit-print-color-adjust: exact;
            }
            @page{
                margin:15px;
            }
        }
    </style>

    @yield('head1')
    @yield('head2')
    @yield('head3')
    @yield('head4')
</head>

<body>
    @yield('content')

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
