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

    {{-- texto bienvenida --}}
    <div class="px-4 mt-10">
        <div class="container mx-auto">
            <p class="text-justify text-lg mb-1 p-1">
                <b class="text-xl uppercase">¿Cerveza gratis?</b> En <b>Beer Lover</b>, por el valor de una cerveza
                puedes tener una gratis <b>¡CUANTAS VECES
                    QUIERAS!</b>
            </p>

    {{-- moestrar los restaurantes asociados  --}}
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
