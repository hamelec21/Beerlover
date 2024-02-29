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
                <b class="text-xl uppercase">¿Cerveza gratis?</b> En los restoranes asociados a <b>Beer Lover</b>, puedes tener una cerveza gratis con tu consumo  <b>!TODOS LOS DIAS</b>
            </p>
            <p class="text-justify text-lg  mb-1 p-1">
                El funcionamiento es muy fácil, al ser socio de <b>Beer Lover</b> podrás acceder a la gran cantidad de bares y
                restoranes que te entregarán una cerveza siempre que cumplas con un consumo mínimo<b>(*)</b>
            </p>
            <p class="text-justify text-lg  mb-1 p-1">
                Todos los socios tienen acceso a un código QR que los habilita como miembros, lo muestras al mesero ¡y
                listo!
            </p>
            <p class="text-justify text-lg mb-1">
                Te invitamos a ser parte de esta comunidad, participa con tus amigos y disfruten todos los días de una
                rica cerveza.
            </p>
            <p class="text-justify text-lg mt-2">
                <b>(*) La cerveza y el consumo dependen de cada local y está informada en nuestra plataforma.</b>
            </p>
        </div>
    </div>
    {{-- moestrar los restaurantes asociados  --}}
    @livewire('frontend.restaurants')

    <div class="px-4 mt-10">
        <div class="container mx-auto">

            <button
                class=" text-white text-lg  font-bold  w-full px-8 py-2 rounded-lg mt-4 bg-green-600 hover:bg-green-700 ">
                <a href="/login"> {{ __('Ingresar') }}</a>
            </button>

        </div>
    </div>


    @include('footer')

    @livewireScripts
</body>

</html>
