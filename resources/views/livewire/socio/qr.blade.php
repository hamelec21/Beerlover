<div>
    @include('header')

    <div class="container mx-auto mt-10">
        <div class="w-full flex justify-center">
            <div class="text-center mt-10">
                {{--
                    {{QrCode::size(150)->generate(route('socio.ticket', ['id' => $comercio->id]))}}
                     --}}


                {{ QrCode::size(150)->generate(route('validar.ticket', ['id' => $comercio->id,'user_id' => $this->user_id])) }}
            </div>
        </div>

        <div class="flex justify-center mt-5">
            <div id="countdown">Tiempo restante: <span id="time">10</span> segundos</div>
        </div>



        <div class="flex justify-center mt-10 px-4">
            <a  href='{{ route('socio.home')}}'
            class='block mt-2 w-full px-4 py-2  text-white font-medium  text-center  bg-red-600 rounded-[14px] hover:bg-red-700'>
            Cancelar
        </a>
        </div>


<script>
    var timeLeft = 10; // Tiempo en segundos
    var countdownElement = document.getElementById('time');

    function countdown() {
        if (timeLeft == 0) {
            // Redirigir a home.socio cuando el tiempo se haya agotado
            window.location.href = "{{ route('socio.home') }}";
        } else {
            countdownElement.innerHTML = timeLeft;
            timeLeft--;
        }
    }

    // Actualizar el contador cada segundo
    setInterval(countdown, 1000);
</script>



    </div>











    </div>
