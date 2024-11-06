<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    @auth
        <div class="flex h-screen">
            @include('layouts.menu-button')
            @include('layouts.sidebar')
            <main class="flex-1 p-6 bg-white rounded-lg shadow-md ml-0 md:ml-64 transition-all">
                @yield('content')
            </main>
        </div>
    @else
        <!-- Estructura sin sidebar ni dashboard para el login -->
        <div class="flex items-center justify-center h-screen bg-gray-100">
            @yield('content')
        </div>
    @endauth
     <script>
        function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("-translate-x-full");
        }
    </script>
</body>
</html>
