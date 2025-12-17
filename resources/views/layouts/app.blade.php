<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $headerTitle ?? 'Unfilled Title' }}</title>
    
    <link rel="icon" type="image/png" href="{{ asset('img/logo-pathloka.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/logo-pathloka.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/logo-pathloka.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    
    <main>
        @yield('content')
    </main>

</body>
</html>