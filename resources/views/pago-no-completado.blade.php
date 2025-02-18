<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeerLover</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="flex items-center justify-center h-screen bg-red-600 relative">

    <div class="relative flex flex-col items-center w-full px-8">

        <div class="w-96 h-auto bg-red-200 rounded-lg p-5 text-center">
            <!-- Logo -->
            <div class="flex justify-center mt-2">
                <img src="{{ asset('img/logo/logo_beerlover.png') }}" class="mt-2 w-20">
            </div>
            <!-- Icono de éxito -->
            <div class="flex justify-center mt-5">
                <img src="{{ asset('img/iconos/negative-payment.png') }}" class="w-20">
            </div>
            <!-- Mensaje -->
            <p class="px-4 text-justify mt-3">
                Lamentablemente, tu transacción no se pudo completar. Por favor, revisa tus datos de pago e intenta
                nuevamente.
            </p>
            <!-- Botón centrado -->
            <div class="flex justify-center">
                <a href="{{ route('comercio-asociados') }}"
                    class="w-1/2 py-2.5 mt-5 bg-black text-white rounded-lg text-sm font-semibold hover:bg-gray-800 text-center">
                    ← Volver Home
                </a>
            </div>
        </div>

    </div>





</body>

</html>
