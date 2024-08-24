<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeerLover</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes bubble {
            0% {
                transform: translateY(0);
                opacity: 1;
            }
            100% {
                transform: translateY(-400px);
                opacity: 0;
            }
        }

        .bubble-container {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: flex-end;
        }

        .bubble {
            position: absolute;
            bottom: 0;
            width: 10px;
            height: 10px;
            background-color: rgba(245, 216, 3, 0.7);
            border-radius: 50%;
            animation: bubble 3s infinite;
            opacity: 0;
        }

        .bubble:nth-child(1) { left: 10%; animation-delay: 0s; }
        .bubble:nth-child(2) { left: 20%; animation-delay: 0.5s; }
        .bubble:nth-child(3) { left: 30%; animation-delay: 1s; }
        .bubble:nth-child(4) { left: 40%; animation-delay: 1.5s; }
        .bubble:nth-child(5) { left: 50%; animation-delay: 2s; }
        .bubble:nth-child(6) { left: 60%; animation-delay: 2.5s; }
        .bubble:nth-child(7) { left: 70%; animation-delay: 3s; }
        .bubble:nth-child(8) { left: 80%; animation-delay: 3.5s; }
        .bubble:nth-child(9) { left: 90%; animation-delay: 4s; }
    </style>
</head>
<body class="flex items-center justify-center h-screen bg-green-600 relative">
    <div class="bubble-container">
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
    </div>

    <div class="relative flex flex-col items-center">
        <img src="{{ asset('img/logo/logo_beerlover.png') }}" class="w-44 md:w-36 lg:w-44 xl:w-44 mb-8">
        <a href="/comercio-asociados">
        <button id="statusButton" class="bg-gray-900 text-white px-8 py-2 rounded-lg mt-4 hover:bg-gray-700 shadow-md">
            Ingresar
        </button>
        </a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const button = document.getElementById('statusButton');

            // Function to change the button color after 3 seconds
            function changeButtonColor() {
                button.classList.remove('bg-gray-900');
                button.classList.add('bg-yellow-400');
                button.textContent = 'Ingresar';
            }

            // Set a timeout to change the button color
            setTimeout(changeButtonColor, 3000);
        });
    </script>
</body>
</html>
