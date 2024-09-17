<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}} | Bilik Media | #1 Best Digital Solution for Your Business</title>    
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/logo/favicon.png">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/slick.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/main.css">       
    
    @stack('header-script')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
