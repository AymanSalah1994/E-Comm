<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dokkan ElMansoura</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/custom.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <div id="app">
       @include('layouts.store.storeparts.nav')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    {{-- Scripts  --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>
