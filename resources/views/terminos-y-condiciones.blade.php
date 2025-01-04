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
    @livewire('menu-segundario')
    <div class="px-4 flex justify-center mt-10">
        <div class="container mx-auto flex justify-center items-center mt-5">
            <h1 class="uppercase font-bold">Términos y Condiciones</h1>
        </div>
    </div>

    <div class="px-4 mb-10">
        <div class="container mx-auto mt-10">
            <p class="text-justify text-lg">
                <b> Fecha última actualización: 31 de Enero de 2024
                    Los Términos y Condiciones constituyen su acuerdo con Beer Lover.
                    Al utilizar la plataforma de Beer Lover, el Suscriptor declara su conformidad con los siguientes
                    puntos.</b>
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
                bloqueará la posibilidad de un nuevo canje durante 12 horas. Para esto, el sistema
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
                <b> Los Suscriptores pueden eliminar su cuenta en cualquier momento.</b> Para ello, deberán enviar su
                solicitud de eliminación de cuenta por correo electrónico a: soporte@beerlover.cl
                Al eliminar tu cuenta, todos tus datos personales, preferencias y contenidos asociados se eliminarán de
                manera irreversible. Una vez que tu cuenta haya sido eliminada, no podrás recuperarla ni acceder a los
                servicios asociados a ella. Ten en cuenta que algunos datos podrían conservarse durante un período de
                tiempo por motivos legales o para cumplir con nuestras políticas de conservación de datos.
            </p>

            <p class="text-justify text-lg mt-5 mb-5">
                <b> Compensación</b>
                El usuario acepta que, conforme a la ley, el desarrollador no será responsable de ninguna reclamación,
                pérdida, daño, costo o gasto de cualquier tipo, ya sea directo, indirecto o incidental, que surja del
                uso de la aplicación, de la incapacidad para utilizarla o del mal uso de ésta. El usuario acepta
                indemnizar y mantener indemne al desarrollador, sus afiliados, empleados y agentes de cualquier
                reclamación, demanda, responsabilidad, daños, pérdidas y gastos (incluidos los honorarios de abogados)
                que surjan de su uso de la aplicación o de cualquier incumplimiento de estos términos.
            </p>

            <p class="text-justify text-lg mt-5 mb-5">
                <b>Pagos del Servicio</b>
                El usuario acepta que todos los pagos realizados para los servicios proporcionados a través de la
                aplicación son finales y no reembolsables, a menos que se indique lo contrario. El usuario se compromete
                a pagar todas las tarifas y cargos aplicables en el momento de la compra y entiende que será responsable
                de pagar cualquier impuesto o cargo adicional que pueda aplicar.<br>
                En caso de que el usuario incumpla con los pagos debidos, el desarrollador se reserva el derecho de
                suspender o cancelar el acceso a la aplicación y a los servicios hasta que se realice el pago completo.
                El usuario acepta indemnizar y mantener indemne al desarrollador de cualquier reclamación, demanda o
                gasto que surja como resultado de su incumplimiento en el pago.

            </p>

            <p class="text-justify text-lg mt-5 mb-5">
                <b>Almacenamiento de datos personales</b>
                Nuestra aplicación recopila y almacena información personal, como el nombre, RUT, correo electrónico y
                preferencias del usuario, con el fin de mejorar la experiencia. Los datos se almacenan de forma segura
                en servidores dedicados y se mantienen durante el tiempo en que el usuario esté suscrito a la
                aplicación. Los usuarios pueden solicitar la eliminación de sus datos en cualquier momento poniéndose en
                contacto con nosotros directamente. Cumplimos con las leyes de protección de datos y nos comprometemos a
                proteger la privacidad de nuestros usuarios.
            </p>


<br><br>






        </div>
    </div>
    @livewire('footer')

</body>

</html>
