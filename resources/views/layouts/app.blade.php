<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>


        <!-- Styles -->
        @livewireStyles
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
