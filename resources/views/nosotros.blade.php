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

<body>

    @livewire('menu-segundario')

    <div class="text-center mt-10 font-bold text-lg">¿Ques es Beerlover?</div>


    <div class=" px-4 lg:mt-10 mt-3 container mx-auto">
        <p class="text-justify">
            Somos un grupo de apasionados por la buena cerveza y las experiencias únicas. Como tres amigos chilenos con
            espíritu emprendedor, decidimos unir nuestra pasión por la vida nocturna y las innovaciones digitales para
            crear una app que transforma la forma en que disfrutas de tus salidas.
        </p>

        <p class="text-justify mt-2">
            Nuestra misión es simple: conectar a los amantes de la cerveza con los mejores bares de la ciudad,
            ofreciendo una experiencia increíble a través de nuestra membresía exclusiva. Creemos en el poder de
            compartir momentos inolvidables con amigos y en el placer de disfrutar una buena cerveza, sin
            preocupaciones.
        </p>
        <p class="text-justify mt-2">
            Más que una app, somos una comunidad que celebra la camaradería, el descubrimiento y, por supuesto, la
            cerveza. ¡Únete al club y vive una experiencia única, bar por bar, brindis tras brindis!
        </p>
    </div>



    @livewire('footer')

    @livewireScripts
</body>

</html>
