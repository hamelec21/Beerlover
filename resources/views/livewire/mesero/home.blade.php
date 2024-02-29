<div>

    @include('header')
    <div class=" bg-white flex flex-col items-center justify-center mt-10">
        <div class="flex justify-center">
            @if (session('error'))
                <div id="error-message" class="alert alert-danger mt-10">{{ session('error') }}</div>
            @endif
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
