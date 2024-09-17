<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Dynamic Title for SEO -->
    <title>{{ $title ?? 'Bilik Media | Best Digital Solution for Your Business' }}</title>

    <!-- Meta Description (Menggunakan data dari controller atau default) -->
    <meta name="description" content="{{ $description ?? 'Bilik Media menyediakan berbagai jasa digital terbaik untuk bisnis Anda.' }}">

    <!-- Meta Keywords (Menggunakan data dari controller atau default) -->
    <meta name="keywords" content="{{ $keywords ?? 'Jasa Digital, Pembuatan Website, SEO, Solusi Digital' }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/logo/favicon.png">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/slick.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/main.css">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KTRYD66LYS"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-KTRYD66LYS');
    </script>
    
    @stack('header-script')

    <meta name="csrf-token" content="{{ csrf_token() }}">
  
</head>
