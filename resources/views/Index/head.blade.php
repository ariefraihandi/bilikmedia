<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Dynamic Title for SEO -->
    <title>{{ $title ?? 'Bilik Media | Best Digital Solution for Your Business' }}</title>

    <!-- Meta Description (Dynamically from controller or default) -->
    <meta name="description" content="{{ $description ?? 'Bilik Media menyediakan berbagai jasa digital terbaik untuk bisnis Anda, termasuk pembuatan website, SEO, dan pemasaran digital.' }}">

    <!-- Meta Keywords (Avoid excessive keywords stuffing) -->
    <meta name="keywords" content="{{ $keywords ?? 'Jasa Digital, Pembuatan Website, SEO, Pemasaran Digital, Solusi Digital' }}">

    <!-- Canonical URL for avoiding duplicate content issues -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/logo/favicon.png">

    <!-- Open Graph (OG) Tags for Social Media Optimization -->
<meta property="og:title" content="{{ $title ?? 'Bilik Media | Best Digital Solution for Your Business' }}">
<meta property="og:description" content="{{ $description ?? 'Bilik Media menyediakan berbagai jasa digital terbaik untuk bisnis Anda.' }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ $product->image ? asset('uploads/products/' . $product->image) : asset('assets/images/logo/favicon.png') }}">
<meta property="og:site_name" content="Bilik Media">

<!-- Twitter Card Tags for Twitter Sharing Optimization -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title ?? 'Bilik Media | Best Digital Solution for Your Business' }}">
<meta name="twitter:description" content="{{ $description ?? 'Bilik Media menyediakan berbagai jasa digital terbaik untuk bisnis Anda.' }}">
<meta name="twitter:image" content="{{ $product->image ? asset('uploads/products/' . $product->image) : asset('assets/images/logo/favicon.png') }}">
    
    <!-- Structured Data (JSON-LD) for Rich Results in Google -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('assets/images/logo.png') }}",
      "name": "Bilik Media",
      "description": "{{ $description ?? 'Bilik Media menyediakan berbagai jasa digital terbaik untuk bisnis Anda, termasuk pembuatan website, SEO, dan pemasaran digital.' }}",
      "sameAs": [
        "https://www.facebook.com/bilikmedia",
        "https://www.instagram.com/bilikmedia"
      ]
    }
    </script>

    <!-- Mobile-specific Meta Tag -->
    <meta name="theme-color" content="#ffffff">

    <!-- MS Validation (Bing Webmaster) -->
    <meta name="msvalidate.01" content="59894226D4BEAEE11743D1E1A5CAF44F" />

    <!-- Google Tag Manager -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KTRYD66LYS"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-KTRYD66LYS');
    </script>

    <!-- CSRF Token for Security -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Stylesheets (Ensure they're minified for performance) -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <!-- Preconnect for performance optimization (especially for Google Fonts or external resources) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Example font loading -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!-- Allow for dynamic scripts to be added -->
    @stack('header-script')

</head>
