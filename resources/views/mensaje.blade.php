<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Beer Lover</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    @livewireStyles
</head>

<body class="bg-gray-100">
    @include('header_front')


    <div class="flex justify-center mt-32">
        <img src="{{ asset('img/logo/logo_beerlover.png') }}" class="w-28">
    </div>
    {{-- texto bienvenida --}}
    <div class="flex items-center justify-center mt-20 bg-gray-100 w-full">
        <div class="bg-yellow-300 px-2 py-6 md:px-6 lg:px-8 mx-2 md:mx-auto max-w-md md:max-w-2xl rounded-lg">
            <h1 class="text-center mb-5 font-bold text-xl">Bienvenidos a Beer Lover</h1>
            <p class="text-center text-lg mb-1 p-1">
                Tu usuario ha sido creado. Revisa tu correo registrado, pronto te enviaremos un enlace de pago.

            </p>
            {{-- mostrar los restaurantes asociados --}}
        </div>
    </div>


        @livewireScripts

    <script type="text/javascript">
        // Función para redirigir a la vista 'home' después de 10 segundos
        function redirectToHome() {
            setTimeout(function(){
                window.location.href = "/"; // Reemplaza 'ruta_de_tu_vista_home' con la URL de tu vista 'home'
            }, 10000); // 10000 milisegundos equivalen a 10 segundos
        }
        // Llama a la función cuando la página haya cargado
        window.onload = redirectToHome;
    </script> 


</body>

</html>
