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
    <div class="px-4">
        <div class="container mx-auto bg-gray-200 flex justify-center items-center mt-10 rounded-lg  border-green-600 border">
            <h1 class="uppercase font-bold p-4">Términos y Condiciones</h1>
        </div>
    </div>

    <div class="px-4 mt-10">
        <div class="container mx-auto p-10 bg-gray-200 rounded-lg border-green-600 border">
            <p class="text-justify text-lg">
               <b> Fecha última actualización: 31 de Enero de 2024
                Los Términos y Condiciones constituyen su acuerdo con Beer Lover.
                Al utilizar la plataforma de Beer Lover, el Suscriptor declara su conformidad con los siguientes puntos.</b>
            </p>
            <p class="text-justify text-lg mt-5 mb-5">
                La Plataforma Beer Lover en todas sus modalidades podrá ser usada por cualquier persona que cumpla con
                los requisitos y procedimientos de acceso y pago. No obstante, la entrega del servicio por parte del
                Local Adherido dependerá exclusivamente de éste último bajo las condiciones de mayoría de edad de quien
                solicite el servicio o de cualquier otro requisito o condición puesta por el local.
            </p>

            <p class="text-justify text-lg mt-5 mb-5">
                Se entiende por Suscriptor a todo aquel Usuario que se mantenga al día con el pago del monto periódico
                estipulado en la Plataforma o sea beneficiario de un cupón válido, lo que le permite el derecho a
                recibir los beneficios definidos en este documento.
            </p>

            <p class="text-justify text-lg mt-5 mb-5">
                El uso doloso, incumplimiento o falsedad por parte del Suscriptor será de su exclusiva responsabilidad
                del Suscriptor.
            </p>

            <p class="text-justify text-lg mt-5 mb-5">
                Si un Suscriptor desea solicitar que sus datos sean eliminados de la base de datos, debe hacerlo por
                escrito a soporte@beerlover.cl
            </p>
            <p class="text-justify text-lg mt-5 mb-5">
                Todos los datos e información entregada por el Suscriptor deben ser verdaderos y fidedignos.
            </p>
            <p class="text-justify text-lg mt-5 mb-5">
                El mal uso del servicio por parte del Suscriptor puede ser causal de la baja del Suscriptor en
                plataforma y el no reembolso del pago del período actual.
            </p>
            <p class="text-justify text-lg mt-5 mb-5">
                Un Local Adherido puede ser una cafetería, pub, restaurante, cervecería o cualquier establecimiento de
                servicio de comidas que se encuentre inscrito en el listado actual y a la vista en la Plataforma.
            </p>

            <p class="text-justify text-lg mt-5 mb-5">
                El Servicio por parte del Local Adherido consiste en que si el Suscriptor registra un monto de consumo
                mínimo, el Local Adherido hará la entrega gratuita de una cerveza con o sin alcohol de entre 350cc y
                500cc cuya marca o sabor serán determinadas exclusivamente por éste y claramente especificada en la
                Plataforma. A su vez el horario de la disponibilidad del servicio y el monto mínimo de consumo por el
                Suscriptor será determinado por el Local adherido y estará a la vista en la Plataforma.
            </p>

            <p class="text-justify text-lg mt-5 mb-5">
                El Suscriptor tiene derecho a canjear una cerveza por cuenta o boleta de consumo, si su total sobrepasa
                el monto mínimo determinado por el Local Adherido y una vez que el servicio sea efectuado, el sistema
                bloqueará la posibilidad de un nuevo canje durante los siguientes 150 minutos. Para esto, el sistema
                entrega un código QR al Suscriptor que valida ante el Local Adherido su membrecía. El personal del Local
                Adherido podrá pedir que el Suscriptor muestre su carnet de identidad si lo estima necesario y el código
                quedará aceptado e inutilizado. El mal uso o uso fraudulento de la Plataforma queda registrado con una
                anotación del personal del Local Adherido.
            </p>

            <p class="text-justify text-lg mt-5 mb-5">
                La cantidad de usos del servicio no está limitada, pudiendo el Usuario hacer uso de éste las veces que
                desee mientras esté activo en la Plataforma.
            </p>

            <p class="text-justify text-lg mt-5 mb-5">
                Beer Lover actúa exclusivamente como intermediario entre el Suscriptor y el Local Adherido.
            </p>

            <p class="text-justify text-lg mt-5 mb-5">
                Para que un usuario pueda suscribirse, la Plataforma le pedirá lo siguiente:
            <ul class="list-disc mt-5 mb-5 px-8">
                <li class="text-lg">Declarar ser mayor de edad.</li>
                <li class="text-lg">Completar los campos obligatorios con datos reales y fidedignos.</li>
                <li class="text-lg">Aceptar los Términos y Condiciones.</li>
            </ul>
            </p>
            <p class="text-justify text-lg mt-5 mb-5">
                En caso de que Beer Lover considere que los datos no son veraces podrá denegarle el acceso y uso a la
                Plataforma.
            </p>
            <p class="text-justify text-lg mt-5 mb-5">
                Al registrarse en la Plataforma el Usuario seleccionará un nombre de usuario (username), email y una
                clave de acceso (password). Tanto el username como el password son estrictamente confidenciales,
                personales e intransferibles y Beer Lover no tiene acceso a revisarlos, recuperarlos ni cambiarlos.
            </p>
            <p class="text-justify text-lg mt-5 mb-5">
                El Usuario se compromete a no hacer mal uso ni compartir su cuenta.
            </p>
            <p class="text-justify text-lg mt-5 mb-5">
                Beer Lover se reserva el derecho de suspender, suprimir o modificar total o parcialmente la Plataforma o
                los servicios ofrecidos en ella sin notificación previa. Asimismo, se reserva el derecho de suspender el
                acceso a la Plataforma a todos o a algunos de los Usuarios o Suscriptores por motivos de mantenimiento,
                emergencia o por cualquier otra causa razonable en cualquier momento.
            </p>

            <p class="text-justify text-lg mt-5 mb-5">
                Los Suscriptores pueden eliminar su cuenta en cualquier momento. Para ello, deberán enviar su solicitud de eliminación de cuenta por correo electrónico a: soporte@beerlover.cl
            </p>






        </div>
    </div>



    @include('footer')
</body>

</html>
