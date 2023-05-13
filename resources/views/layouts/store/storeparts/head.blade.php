<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', __('Dokkan ElMansoura'))</title>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('store_assets/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('store_assets/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('store_assets/css/owl.theme.green.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('store_assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('store_assets/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('store_assets/css/owly.css') }}" />
    <link rel="stylesheet" href="{{ asset('store_assets/css/search.css') }}" />
    <link rel="stylesheet" href="{{ asset('store_assets/css/start-rating.css') }}">
    <link rel="stylesheet" href="{{ asset('store_assets/css/merchant-card.css') }}">
    <link rel="stylesheet" href="{{ asset('store_assets/css/back-to-top.css') }}">



    {{-- Log in  --}}
    <link rel="stylesheet" href="{{ asset('store_assets/css/login.css') }}">
    {{-- Log in  --}}
    <link rel="stylesheet" href="{{ asset('store_assets/css/funda-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('store_assets/css/marquee.css') }}">
    @yield('specifyStyle')
</head>
