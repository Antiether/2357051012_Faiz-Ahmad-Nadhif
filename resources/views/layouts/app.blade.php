<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Document')</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f8;
        }
        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            min-height: 80vh;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            overflow: visible !important;
            position: relative;
            z-index: 1;
        }
        select {
            position: relative;
            z-index: 9999;
        }
        .navbar {
            position: relative !important;
            z-index: 100;
        }
    </style>
    
    @yield('styles')
</head>
<body>
    @include('components.navbar')
    
    <div class="container">
        @yield('content')
    </div>
    
    @include('components.footer')
    
    @yield('scripts')
</body>
</html>