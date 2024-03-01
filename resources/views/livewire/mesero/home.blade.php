<div>
    {{-- header --}}
    <div class="bg-green-700 h-56 md:h-44 lg:36 xl:h-36 flex items-center align-middle rounded-b-2xl shadow-md">
        <div class="container mx-auto">
            <div class="flex justify-around">
                <div>
                    <img src="{{ asset('img/logo/logo_beerlover.png') }}" class=" w-44 md:w-36 lg:w-44 xl:w-44">
                </div>

                <div class="mt-5">
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <div class="ml-10 rounded-full bg-white  w-10 h-10 mt-2">
                            <button class="px-2.5 py-2 flex items-center space-x-4 rounded-md text-red-600 group">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>

                            </button>

                            <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">

                            </x-dropdown-link>

                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

    {{-- fin header --}}
    <div class="container px-4">
        <div class=" bg-white flex flex-col items-center justify-center mt-10">
            <div class="flex justify-center">
                @if (session('error'))
                    <div id="error-message" class="alert alert-danger mt-10">{{ session('error') }}</div>
                @endif
            </div>
        </div>
    </div>

    <!-- mesero.home.blade.php -->
    <style>
        .fade-out {
            opacity: 0;
            transition: opacity 1s ease-out;
        }
    </style>


    <script>
        // Desvanecer el mensaje de error después de 5 segundos
        setTimeout(function() {
            var errorMessage = document.getElementById('error-message');
            errorMessage.classList.add('fade-out');
            setTimeout(function() {
                errorMessage.style.display = 'none';
            }, 2000); // Espera un segundo después de la transición antes de ocultar completamente el elemento
        }, 5000);

        // Redirigir a home.socio después de 5 segundos
        setTimeout(function() {
            window.location.href = "{{ route('socio.home') }}";
        }, 5000);
    </script>






</div>
