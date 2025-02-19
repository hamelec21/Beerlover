<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('img/favicon/favicon.ico') }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

    @laravelPWA
    <!-- Styles -->
    @livewireStyles


    <!-- iOS Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('pwa/apple-icon-180x180.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('pwa/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('pwa/apple-icon-120x120.png') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="{{ config('app.name', 'Laravel') }}">

    <!-- iOS Splash Screen -->
    <link rel="apple-touch-startup-image" href="{{ asset('pwa/splash-640x1136.png') }}"
        media="(device-width: 320px) and (device-height: 480px)">
    <link rel="apple-touch-startup-image" href="{{ asset('pwa/splash-750x1334.png') }}"
        media="(device-width: 375px) and (device-height: 667px)">
    <link rel="apple-touch-startup-image" href="{{ asset('pwa/splash-828x1792.png') }}"
        media="(device-width: 414px) and (device-height: 896px)">
    <link rel="apple-touch-startup-image" href="{{ asset('pwa/splash-1125x2436.png') }}"
        media="(device-width: 375px) and (device-height: 812px)">
    <link rel="apple-touch-startup-image" href="{{ asset('pwa/splash-1242x2688.png') }}"
        media="(device-width: 414px) and (device-height: 896px)">
    <link rel="apple-touch-startup-image" href="{{ asset('pwa/splash-1536x2048.png') }}"
        media="(device-width: 768px) and (device-height: 1024px)">
    <link rel="apple-touch-startup-image" href="{{ asset('pwa/splash-1668x2224.png') }}"
        media="(device-width: 834px) and (device-height: 1112px)">
    <link rel="apple-touch-startup-image" href="{{ asset('pwa/splash-2048x2732.png') }}"
        media="(device-width: 1024px) and (device-height: 1366px)">


</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-white">


        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
    <script>
        Livewire.on('insert', function(message) {

            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Registro Creado Exitosamente',
                showConfirmButton: false,
                timer: 1500
            })
        })
    </script>
    <!--mensajes para editar-->
    <script>
        Livewire.on('editar', function(message) {

            Swal.fire({
                position: 'top-end',
                icon: 'info',
                title: 'Registro Actualizado',
                showConfirmButton: false,
                timer: 1500
            })
        })
    </script>
    <!--mensajes para Eliminar-->
    <script>
        Livewire.on('borrar', function(message) {

            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                title: 'Registro Eliminado',
                showConfirmButton: false,
                timer: 1500
            })

        })
    </script>

    <script>
        Livewire.on('error401', function(message) {

            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                title: 'Código 401 No autorizado',
                showConfirmButton: false,
                timer: 2500
            })

        })
    </script>


    <script>
        Livewire.on('error400', function(message) {

            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                title: 'Código 400 Solicitud incorrecta',
                showConfirmButton: false,
                timer: 2500
            })

        })
    </script>


    <script>
        Livewire.on('bloqueado', function(message) {

            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                title: 'El Ticket ha Sido Bloqueado',
                showConfirmButton: false,
                timer: 2000
            })

        })
    </script>


    @yield('js')


</body>

</html>
