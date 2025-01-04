<div>
    @livewire('menu-segundario')

    <div class="container mx-auto mt-10">
        <h1 class="text-center text-xl font-bold">Ticket Generado</h1>
        <div class="px-4 mt-5 mb-5">
            <div class="w-full flex justify-center bg-gray-100 py-10">
                <div class="text-center">
                    <div class="flex justify-center mt-5 mb-5">
                        <div id="countdown">Tiempo restante: <span id="time">10</span> segundos</div>
                    </div>

                    {{ QrCode::size(200)->generate(route('validar.ticket', ['id' => $comercio->id, 'user_id' => $this->user_id])) }}

                    <div class="mt-4">
                        <div class="text-lg font-bold">
                            {{ $this->socio->name }} {{ $this->socio->papellido }}
                        </div>

                        <div class="mt-2">
                            <span class="text-lg font-bold">Rut: </span>{{ $ultimoscuatrodigitos }}
                        </div>

                        <div class="mt-2">

                            <span class="text-lg font-bold">
                                Canje Por<br></span>
                            <span class="bg-yellow-400  py-1 px-4">{{ $this->comercio->cerveza }}</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    @livewire('socio.footer')
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
