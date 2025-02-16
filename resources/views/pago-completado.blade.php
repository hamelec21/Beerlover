<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeerLover</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="flex items-center justify-center h-screen bg-green-600 relative">
    <div class="relative flex flex-col items-center w-full px-8">
        <div class="flex mb-2 lg:w-1/2">
            <div class="bg-white rounded-2xl shadow-lg p-6 w-full border border-gray-200 mt-2 mb-2 relative">
                <div
                class=" text-black text-sm font-semibold rounded-full px-3 py-1 absolute -mt-10 left-4">
                <span class="uppercase">
                    <img src="{{asset('img/logo/logo_beerlover.png')}}" class="w-28 -mt-10">
                </span>
            </div>
                <!-- Icono -->
                <div class="text-sm font-semibold rounded-full px-3 py-1 absolute -mt-10 right-4">
                    <img src="{{ asset('img/logo/positivo.png') }}" class="w-28">
                </div>
                <h2 class="text-3xl font-bold mt-4">
                    Pago Exitoso
                </h2>
                <p class="text-gray-500 text-md mt-1 text-justify">
                    Tu transacción ha sido completada correctamente. Gracias por tu compra. Recibirás un correo de
                    confirmación con los detalles de tu pedido.

                    Si tienes alguna pregunta o necesitas asistencia adicional, no dudes en ponerte en contacto con
                    nosotros. ¡Esperamos que disfrutes de tu compra!
                <div
                    class="py-2.5 mt-5 bg-black text-white rounded-lg text-sm font-semibold hover:bg-gray-800 flex justify-center items-center px-4 ">

                   <a href="{{route('comercio-asociados')}}"> <span class="text-sm font-semibold"> ← Volver Home</span></a>
                </div>
            </div>

        </div>




    </div>



</body>

</html>
